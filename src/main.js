import gsap from 'gsap';
import ScrollTrigger from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

//////////////////////////////////////////
/////// START DEV ENV ASSET FIX //////////
//////////////////////////////////////////
// // Dev-only: load SCSS through Vite for live style updates without affecting the production build.
if (import.meta.env.DEV) {
  import("./style.scss");

  if ('scrollRestoration' in history) {
    history.scrollRestoration = 'manual';
  }

  window.addEventListener('load', () => {
    window.scrollTo(0, 0);
  });
}
//////////////////////////////////////////
/////// END DEV ENV ASSET FIX ////////////
//////////////////////////////////////////

// Register core GSAP plugins.
gsap.registerPlugin(ScrollTrigger);

let drawSvgReady = false;
let drawSvgPromise = null;

// Lazy-load GSAP DrawSVG plugin when needed.
const loadDrawSVGPlugin = () => {
  if (drawSvgReady) return Promise.resolve();
  if (drawSvgPromise) return drawSvgPromise;

  drawSvgPromise = import("gsap/DrawSVGPlugin")
    .then((module) => {
      const plugin = module.DrawSVGPlugin || module.default;
      if (!plugin) return;
      gsap.registerPlugin(plugin);
      drawSvgReady = true;
    })
    .catch((error) => {
      drawSvgPromise = null;
      throw error;
    });

  return drawSvgPromise;
};

// Animated SVG motif (DrawSVG).
const ayaMotifSVGDraw = () => {
  const init = () => {
    const aya = document.getElementById("aya_motif");
    if (!aya) return;
    if (!gsap) return;

    const drawable = aya.querySelectorAll("path, line, polyline, polygon, ellipse, circle, rect");
    if (!drawable.length) return;

    // ensure SVG is visible before drawing
    gsap.set(aya, { opacity: 1, visibility: "visible" });

    const prefersReducedMotion = window.matchMedia &&
      window.matchMedia("(prefers-reduced-motion: reduce)").matches;
    if (prefersReducedMotion) {
      // skip animation for reduced motion
      gsap.set(drawable, { drawSVG: "0% 100%" });
      return;
    }
    // initial draw state
    gsap.set(drawable, { drawSVG: "0% 0%" });

    const groups = {
      center: aya.querySelectorAll("#center path, #center line, #center polyline, #center polygon, #center ellipse, #center circle, #center rect"),
      centerRing: aya.querySelectorAll("#center_ring path, #center_ring line, #center_ring polyline, #center_ring polygon, #center_ring ellipse, #center_ring circle, #center_ring rect"),
      details: aya.querySelectorAll("#details path, #details line, #details polyline, #details polygon, #details ellipse, #details circle, #details rect"),
      circle: aya.querySelectorAll("#circle path, #circle line, #circle polyline, #circle polygon, #circle ellipse, #circle circle, #circle rect")
    };

    const tl = gsap.timeline({
      // dial: per-group draw duration + easing
      defaults: { duration: 0.7, ease: "power1.inOut" }
    });
    // dial: fade-in speed + per-element opacity stagger
    tl.to(drawable, { opacity: 1, duration: 0.6, stagger: 0.005 }, 0);

    if (groups.circle.length) {
      // dial: overlap timing between groups
      tl.to(groups.circle, { drawSVG: "0% 100%", stagger: 0.01 }, 0);
    }
    if (groups.center.length) {
      // dial: center line draw stagger
      tl.to(groups.center, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
    }
    if (groups.centerRing.length) {
      // dial: overlap timing between groups
      tl.to(groups.centerRing, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
    }
    if (groups.details.length) {
      // dial: overlap timing between groups
      tl.to(groups.details, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
    }
  };

  const startWhenVisible = () => {
    const aya = document.getElementById("aya_motif");
    if (!aya) return;

    const runInit = () => {
      loadDrawSVGPlugin()
        .then(() => init())
        .catch(() => {});
    };

    if (!("IntersectionObserver" in window)) {
      window.setTimeout(runInit, 300); // dial: delay before starting when IO is unavailable
      return;
    }

    const io = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (!entry || !entry.isIntersecting) return;
        io.unobserve(entry.target);
        window.setTimeout(runInit, 300); // dial: delay after entering viewport
      });
    }, { threshold: 0.35 }); // dial: how much of SVG must be visible before starting

    io.observe(aya);
  };

  startWhenVisible();
};

// Lenis smooth scrolling with GSAP ticker integration.
const LenisScroll = {
  setupLenis() {
    const lenis = new Lenis({
      duration: 2.8,
      easing: (t) => (t === 1 ? 1 : 1 - Math.pow(2, -10 * t)),
      direction: "vertical",
      gestureDirection: "vertical",
      smooth: true,
      mouseMultiplier: 0.8,
      smoothTouch: false,
      touchMultiplier: 1.5,
      infinite: false,
      orientation: "vertical",
      lerp: 0.05,
      wheelEventsTarget: document.body,
    });

    this.lenis = lenis;

    lenis.on("scroll", ScrollTrigger.update);

    gsap.ticker.add((time) => {
      lenis.raf(time * 1000);
    });

    gsap.ticker.lagSmoothing(0);

    lenis.on("scroll", () => {});

    const stopElements = document.querySelectorAll("[data-lenis-prevent]");
    stopElements.forEach((el) => {
      el.addEventListener("wheel", (e) => {
        e.stopPropagation();
      });
    });
  },

  init() {
    const self = this;

    setTimeout(() => {
      if (
        typeof Lenis !== "function" ||
        typeof gsap === "undefined" ||
        typeof ScrollTrigger === "undefined"
      ) {
        console.error("Lenis library not loaded. Check your install.");
        return;
      }

      self.setupLenis();
    }, 0);
  },

  getInstance() {
    return this.lenis;
  },

  stop() {
    if (this.lenis) {
      this.lenis.stop();
    }
  },

  start() {
    if (this.lenis) {
      this.lenis.start();
    }
  },

  scrollTo(target, options = {}) {
    if (this.lenis) {
      this.lenis.scrollTo(target, options);
    }
  },
};

// Scroll-to-top button behavior.
const scrollToTop = () => {
  const scrollBtn = document.getElementById("scrollBtn");
  if (!scrollBtn) return;

  window.addEventListener("scroll", () => {
    scrollBtn.style.display = window.scrollY > 200 ? "flex" : "none";
  });

  scrollBtn.addEventListener("click", () => {
    // if (LenisScroll.getInstance()) {
    //   LenisScroll.scrollTo(0, { duration: 1.2 });
    //   return;
    // }

    window.scrollTo({
      top: 0,
      behavior: "smooth",
    });
  });
};

// Sticky header class toggling.
const stickyHeader = () => {
  const header = document.querySelector('.sticky-active');
  if (!header) return;

  const onScroll = () => {
    header.classList.toggle('is-sticky', window.scrollY > 400);
  };

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });
};

// Preloader fade-out handling.
const preloader = () => {
  const preloader = document.getElementById("preloader");
  if (!preloader) return;

  const transitionDuration = 500;
  const fallbackDelay = 3000;

  const hidePreloader = () => {
    if (preloader.dataset.hidden === "true") return;
    preloader.dataset.hidden = "true";
    preloader.style.transition = `opacity ${transitionDuration}ms ease`;
    preloader.style.opacity = "0";
    window.setTimeout(() => {
      preloader.style.display = "none";
    }, transitionDuration);
  };

  window.addEventListener("load", hidePreloader, { once: true });
  window.setTimeout(hidePreloader, fallbackDelay);
};

// Parallax effects for hero/section images.
const cwpParallax = () => {
  const parallaxSections = Array.from(
    document.querySelectorAll(".parallax-banner")
  )
    .map((section) => {
      const wrap = section.querySelector(".parallax-wrap");
      const img = section.querySelector(".parallax-img");
      if (!wrap || !img) return null;
      return {
        section,
        wrap,
        img,
        maxTranslate: 0,
      };
    })
    .filter(Boolean);

  if (!parallaxSections.length) return;

  let ticking = false;

  const updateMetrics = () => {
    parallaxSections.forEach((item) => {
      const sectionHeight = item.section.offsetHeight;
      const wrapHeight = item.wrap.offsetHeight;
      const extra = Math.max(0, wrapHeight - sectionHeight);
      item.maxTranslate = extra / 2;
    });
  };

  const updateParallax = () => {
    const viewportHeight = window.innerHeight;

    parallaxSections.forEach((item) => {
      const rect = item.section.getBoundingClientRect();
      if (rect.bottom < 0 || rect.top > viewportHeight) return;

      const progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
      const clamped = Math.min(1, Math.max(0, progress));
      const translate = (clamped - 0.5) * 2 * item.maxTranslate;

      item.img.style.transform = `translate3d(0, ${translate.toFixed(2)}px, 0)`;
    });

    ticking = false;
  };

  const requestUpdate = () => {
    if (ticking) return;
    ticking = true;
    window.requestAnimationFrame(updateParallax);
  };

  const onResize = () => {
    updateMetrics();
    requestUpdate();
  };

  window.addEventListener("scroll", requestUpdate, { passive: true });
  window.addEventListener("resize", onResize);

  if ("ResizeObserver" in window) {
    const ro = new ResizeObserver(() => {
      updateMetrics();
      requestUpdate();
    });
    parallaxSections.forEach((item) => ro.observe(item.section));
  }

  updateMetrics();
  updateParallax();
};

// Dark/light theme toggle logic.
const themeToggle = () => {
  const body = document.body;
  const themeBtn = document.getElementById("themeBtn");
  const darkModeImages = document.querySelectorAll(
    ".darkModeTrigger, .darkModeTriggerImg, .darkModeTriggerImg2"
  );

  if (localStorage.getItem("themeMode") === "active") {
    body.classList.add("active-body", "dark-mode");
    if (themeBtn) themeBtn.classList.add("active-btn");
  }

  const toggleDarkMode = () => {
    if (!body.classList.contains("active-body")) {
      body.classList.add("active-body", "dark-mode");
      if (themeBtn) themeBtn.classList.add("active-btn");
      localStorage.setItem("themeMode", "active");
      localStorage.setItem("darkMode", "enabled");
      return;
    }

    body.classList.remove("active-body", "dark-mode");
    if (themeBtn) themeBtn.classList.remove("active-btn");
    localStorage.setItem("themeMode", "inactive");
    localStorage.setItem("darkMode", "disabled");
  };

  if (themeBtn) {
    themeBtn.addEventListener("click", () => {
      toggleDarkMode();
    });
  }

  darkModeImages.forEach((el) => {
    el.addEventListener("click", (event) => {
      event.preventDefault();
      toggleDarkMode();
    });
  });
};

// Search popup open/close controls.
/*
  const searchPopup = () => {
    document.addEventListener("click", (event) => {
      const target = event.target;
      if (target.matches(".popup-search") || target.closest(".popup-search")) {
        event.preventDefault();
        const button = target.matches(".popup-search")
          ? target
          : target.closest(".popup-search");
        const popupId = button.getAttribute("data-popup");
        const popup = document.querySelector(
          `.search-popup[data-popup="${popupId}"]`
        );
        if (popup) {
          popup.classList.add("active");
        }
      }
    });

    document.addEventListener("click", (event) => {
      const target = event.target;
      if (target.matches(".close-popup") || target.closest(".close-popup")) {
        const closeBtn = target.matches(".close-popup")
          ? target
          : target.closest(".close-popup");
        const popup = closeBtn.closest(".search-popup");
        if (popup) {
          popup.classList.remove("active");
        }
      } else if (target.matches(".search-popup")) {
        target.classList.remove("active");
      }
    });

    // No capture-phase listener needed; overlay click is handled above.
  };
*/

// Password visibility toggle.
/*
  const passwordToggle = () => {
    const toggleBtn = document.getElementById("togglePassword");
    const passwordInput = document.getElementById("passwordInput");

    if (!toggleBtn || !passwordInput) return;

    const icon = toggleBtn.querySelector("i");
    if (!icon) return;

    toggleBtn.addEventListener("click", () => {
      if (passwordInput.type === "password") {
        passwordInput.type = "text";
        icon.classList.remove("fa-eye");
        icon.classList.add("fa-eye-slash");
        return;
      }

      passwordInput.type = "password";
      icon.classList.remove("fa-eye-slash");
      icon.classList.add("fa-eye");
    });
  };
*/

// Side menu (off-canvas) interactions.
const sideMenu = () => {
  const overlay = document.querySelector(".overlay");
  const toggles = document.querySelectorAll(".hamburger.popup-menu");
  const sideMenus = document.querySelectorAll(".side-menu");
  const closeBtns = document.querySelectorAll(".side-menu .close-btn");

  if (!toggles.length || !overlay) return;

  const lockScroll = () => {
    document.body.classList.add("mobile-menu-open");
    LenisScroll.stop();
  };

  const unlockScroll = () => {
    document.body.classList.remove("mobile-menu-open");
    LenisScroll.start();
  };

  toggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const menuName = toggle.getAttribute("data-menu");
      const menu = document.querySelector(
        `.side-menu[data-menu="${menuName}"]`
      );

      if (menu) {
        menu.classList.add("active");
        overlay.classList.add("active");
        lockScroll();
      }
    });
  });

  closeBtns.forEach((closeBtn) => {
    closeBtn.addEventListener("click", () => {
      const menu = closeBtn.closest(".side-menu");
      if (!menu) return;
      menu.classList.remove("active");
      overlay.classList.remove("active");
      unlockScroll();
      menu.querySelectorAll(".active").forEach((el) => {
        el.classList.remove("active");
      });
    });
  });

  overlay.addEventListener("click", () => {
    sideMenus.forEach((menu) => {
      menu.classList.remove("active");
      menu.querySelectorAll(".active").forEach((el) => {
        el.classList.remove("active");
      });
    });
    overlay.classList.remove("active");
    unlockScroll();
  });

  const menuLinks = document.querySelectorAll(".menu-left li > a");
  menuLinks.forEach((link) => {
    link.addEventListener("click", (event) => {
      const parentLi = link.parentElement;
      const subMenu = parentLi ? parentLi.querySelector("ul") : null;

      if (subMenu) {
        event.preventDefault();
        subMenu.classList.toggle("active");
        parentLi.classList.toggle("active");
      }
    });
  });

  const sideMenuItems = document.querySelectorAll(".side-menu > ul > li");
  sideMenuItems.forEach((item) => {
    item.addEventListener("click", () => {
      item.classList.toggle("active");
    });
  });

  const sideSubMenus = document.querySelectorAll(".side-menu .sub-menu");
  sideSubMenus.forEach((subMenu) => {
    subMenu.addEventListener("click", (event) => {
      event.stopPropagation();
      subMenu.classList.toggle("active");
    });
  });
};

// Original reveal animation
/*
  const revealUpAnimation = () => {
    const elements = document.querySelectorAll(".reveal-up");
    if (!elements.length) return;

    elements.forEach((el) => {
      el.style.opacity = "0";
      el.style.transform = "translateY(30px) scale(0.98)";
      el.style.willChange = "transform, opacity";
      el.style.transition = "opacity 1.1s ease-out, transform 1.1s ease-out";
    });

    if (!("IntersectionObserver" in window)) {
      elements.forEach((el) => {
        el.style.opacity = "1";
        el.style.transform = "translateY(0) scale(1)";
      });
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry || !entry.isIntersecting) return;
          const el = entry.target;
          el.style.opacity = "1";
          el.style.transform = "translateY(0) scale(1)";
          io.unobserve(el);
        });
      },
      { threshold: 0.45 }
    );

    elements.forEach((el) => io.observe(el));
  };
*/

// Original fade animation
/*
  const revealFadeAnimation = () => {
    const elements = document.querySelectorAll(".reveal-fade");
    if (!elements.length) return;

    elements.forEach((el) => {
      el.style.opacity = "0";
      el.style.willChange = "opacity";
      // fade duration + easing
      el.style.transition = "opacity 1.2s ease-out";
    });

    if (!("IntersectionObserver" in window)) {
      elements.forEach((el) => {
        el.style.opacity = "1";
      });
      return;
    }

    const io = new IntersectionObserver(
      (entries) => {
        entries.forEach((entry) => {
          if (!entry || !entry.isIntersecting) return;
          const el = entry.target;
          el.style.opacity = "1";
          io.unobserve(el);
        });
      },
      // trigger point: 0 = on entry, 1 = fully in view
      { threshold: 0.8 }
    );

    elements.forEach((el) => io.observe(el));
  };
*/

// GSAP subtitle reveal animation.
const animateSubtitles = () => {
  const subtitles = document.querySelectorAll('.sec-title .sub-title');

  subtitles.forEach((sub) => {
    if (sub.dataset.wrapped === 'true') return;
    const text = sub.textContent.trim();
    sub.innerHTML = `<span class="sub-text">${text}</span>`;
    const innerSpan = sub.querySelector('.sub-text');
    if (!innerSpan) return;
    sub.dataset.wrapped = 'true';

    gsap.set(innerSpan, {
      width: 1,
      display: 'inline-block',
      overflow: 'hidden',
    });

    gsap.to(innerSpan, {
      width: innerSpan.scrollWidth,
      duration: 1.2,
      ease: 'power2.out',
      scrollTrigger: {
        trigger: sub.closest('.sec-title'),
        start: 'top 90%',
        toggleActions: 'play none none none',
      },
    });
  });
};

// GSAP letter-by-letter heading animation.
const animateHeadings = () => {
  const headings = document.querySelectorAll('.title.animated-heading');

  headings.forEach((title) => {
    if (title.dataset.wrapped === 'true') return;
    const words = title.textContent.trim().split(/\s+/);

    const wrappedWords = words
      .map((word) => {
        const letters = word
          .split('')
          .map((letter) => `<span class="letter">${letter}</span>`)
          .join('');
        return `<span class="word">${letters}</span>`;
      })
      .join('<span class="space"> </span>');

    title.innerHTML = wrappedWords;
    title.dataset.wrapped = 'true';

    const letters = title.querySelectorAll('.letter');

    gsap.from(letters, {
      y: 40,
      opacity: 0,
      stagger: 0.04,
      duration: 0.9,
      ease: 'power3.out',
      delay: 0.3,
      scrollTrigger: {
        trigger: title,
        start: 'top 85%',
        once: true,
      },
    });
  });
};

// GSAP hero slide transition choreography.
/*
  const animateSlide = (slide) => {
    if (!slide) return;

    gsap.set(slide, { visibility: 'visible' });

    const elements = slide.querySelectorAll(
      '.title, .hero-btn2 p, .ibt-btn, .exp-box'
    );
    gsap.set(elements, { y: 50, opacity: 0 });

    const tl = gsap.timeline();
    const title = slide.querySelector('.title');
    const paragraph = slide.querySelector('.hero-btn2 p');
    const btn = slide.querySelector('.ibt-btn');
    const expBox = slide.querySelector('.exp-box');

    if (title) {
      tl.to(title, { y: 0, opacity: 1, duration: 0.6, ease: 'power3.out' });
    }
    if (paragraph) {
      tl.to(
        paragraph,
        { y: 0, opacity: 1, duration: 0.5, ease: 'power3.out' },
        '-=0.4'
      );
    }
    if (btn) {
      tl.to(
        btn,
        { y: 0, opacity: 1, duration: 0.5, ease: 'power3.out' },
        '-=0.4'
      );
    }
    if (expBox) {
      tl.to(
        expBox,
        { y: 0, opacity: 1, duration: 0.6, ease: 'power3.out' },
        '-=0.3'
      );
    }
  };
*/

// Swiper hero slider bootstrapping.
/*
  const initHeroSlider = () => {
    if (typeof Swiper === 'undefined') return;

    const heroSlider = document.querySelector('.hero-slider2');
    if (!heroSlider) return;

    new Swiper('.hero-slider2', {
      loop: true,
      effect: 'fade',
      speed: 800,
      fadeEffect: { crossFade: true },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      on: {
        init() {
          animateSlide(this.slides[this.activeIndex]);
        },
        slideChange() {
          animateSlide(this.slides[this.activeIndex]);
        },
      },
    });
  };
*/

// GSAP hover animations for contact buttons.
/*
  const animateContactButtons = () => {
    const buttons = document.querySelectorAll('.contact-btn');

    buttons.forEach((btn) => {
      const text = btn.querySelector('.text');
      const outer = btn.querySelector('.border-outer');
      const inner = btn.querySelector('.border-inner');
      let moveTimeout;

      btn.addEventListener('mousemove', (event) => {
        clearTimeout(moveTimeout);

        const rect = btn.getBoundingClientRect();
        const x = event.clientX - rect.left - rect.width / 2;
        const y = event.clientY - rect.top - rect.height / 2;

        if (inner) {
          gsap.to(inner, {
            x: x * 0.35,
            y: y * 0.35,
            duration: 0.08,
            ease: 'power2.out',
          });
        }

        if (outer) {
          gsap.to(outer, {
            x: x * 0.15,
            y: y * 0.15,
            duration: 0.25,
            ease: 'power2.out',
          });
        }

        if (text) {
          gsap.to(text, {
            x: x * 0.1,
            y: y * 0.1,
            duration: 0.2,
            ease: 'power2.out',
          });
        }

        moveTimeout = setTimeout(() => {
          const targets = [inner, outer].filter(Boolean);
          if (targets.length) {
            gsap.to(targets, {
              x: x * 0.1,
              y: y * 0.1,
              duration: 0.2,
              ease: 'power2.out',
            });
          }
          if (text) {
            gsap.to(text, {
              x: x * 0.1,
              y: y * 0.1,
              duration: 0.25,
              ease: 'power2.out',
            });
          }
        }, 100);
      });

      btn.addEventListener('mouseleave', () => {
        clearTimeout(moveTimeout);
        const targets = [inner, outer, text].filter(Boolean);
        if (!targets.length) return;
        gsap.to(targets, {
          x: 0,
          y: 0,
          duration: 0.25,
          ease: 'power2.out',
        });
      });
    });
  };
*/

// GSAP entrance animations for demo images.
/*
  const animateDemoImages = () => {
    const demoImgs = document.querySelectorAll('.demo-img, .ser-anim');
    if (!demoImgs.length) return;

    gsap.utils.toArray(demoImgs).forEach((img, index) => {
      gsap.fromTo(
        img,
        { y: 80, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 0.8,
          ease: 'power3.out',
          delay: index * 0.03,
          scrollTrigger: {
            trigger: img,
            start: 'top 95%',
            end: 'bottom 80%',
            toggleActions: 'play none none none',
            once: true,
          },
        }
      );
    });
  };
*/

// GSAP entrance animations for service cards.
/*
  const animateServiceCards = () => {
    const serviceCards = document.querySelectorAll(
      '.ser-card14-card1, .ser-card14-card2, .ser-card14-card3, .ser-card14-card4, .ser-card14-card5'
    );

    if (!serviceCards.length) return;

    gsap.utils.toArray(serviceCards).forEach((card, index) => {
      gsap.fromTo(
        card,
        { y: 50, opacity: 0 },
        {
          y: 0,
          opacity: 1,
          duration: 0.1,
          ease: 'power3.out',
          delay: index * 0.2,
          scrollTrigger: {
            trigger: card,
            start: 'top 90%',
            end: 'bottom 80%',
            toggleActions: 'play none none none',
            once: true,
          },
        }
      );
    });
  };
*/

// GSAP animations for section 24 content blocks.
/*
  const animateSection24 = () => {
    const funfact = document.querySelector('.funfact-content24');
    if (funfact) {
      gsap.from('.funfact-content24', {
        x: 100,
        opacity: 0,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: '.funfact-content24',
          start: 'top 85%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    }

    const serContent = document.querySelector('.ser-content24');
    if (serContent) {
      gsap.from('.ser-content24', {
        x: -100,
        opacity: 0,
        duration: 1,
        ease: 'power3.out',
        scrollTrigger: {
          trigger: '.ser-content24',
          start: 'top 85%',
          toggleActions: 'play none none none',
          once: true,
        },
      });
    }
  };
*/

// Give hero header top padding based on header height
/*
const resizeHeaderHeight = () => {
  const header = document.querySelector('.cwp-header-absolute');
  const hero = document.getElementById('hero-header');
  if (!header || !hero) return;

  const resizeObserver = new ResizeObserver((entries) => {
    const entry = entries[0];

    const height = entry.contentRect.height;
    console.log('header height ' + height);

    const heroPaddingBottom = parseFloat(getComputedStyle(hero).paddingBottom) || 0;
    console.log('hero bottom padding ' + height);

    const top = parseFloat(getComputedStyle(header).paddingTop) || 0;
    console.log('header top padding ' + top);

    hero.style.paddingTop = `${height + top + heroPaddingBottom}px`;
  });

  resizeObserver.observe(header);
};
*/

// Active menu highlighting for desktop + mobile menus.
const activeMenu = () => {
  const currentPath = window.location.pathname.replace(/\/+$/, "") || "/";

  const setActive = (menuLi) => {
    const links = menuLi.querySelectorAll("a");
    let found = false;

    for (let i = 0; i < links.length; i++) {
      const link = links[i];
      const href = link.getAttribute("href");
      if (!href || href === "#" || href.indexOf("mailto:") === 0 || href.indexOf("tel:") === 0) {
        continue;
      }

      try {
        const url = new URL(href, window.location.origin);
        const linkPath = url.pathname.replace(/\/+$/, "") || "/";

        if (linkPath === currentPath) {
          link.classList.add("active");
          found = true;
        }
      } catch (error) {
        // Ignore malformed URLs.
      }
    }

    const childLis = menuLi.querySelectorAll("li");
    for (let j = 0; j < childLis.length; j++) {
      if (setActive(childLis[j])) {
        found = true;
      }
    }

    let topLink = null;
    for (let k = 0; k < menuLi.children.length; k++) {
      if (menuLi.children[k].tagName === "A") {
        topLink = menuLi.children[k];
        break;
      }
    }

    if (found) {
      if (topLink) topLink.classList.add("active");
      menuLi.classList.add("active");
    } else {
      if (topLink) topLink.classList.remove("active");
      menuLi.classList.remove("active");
    }

    return found;
  };

  const topMenuItems = document.querySelectorAll(".main-menu > ul > li");
  for (let i = 0; i < topMenuItems.length; i++) {
    setActive(topMenuItems[i]);
  }

  const mobileMenuItems = document.querySelectorAll(".side-menu > ul > li");
  for (let j = 0; j < mobileMenuItems.length; j++) {
    setActive(mobileMenuItems[j]);
  }
};

// GSAP animation orchestrator.
const gsapAnimations = () => {
  if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

  //////////////////////////////////////////
  /////// START DEV ENV ANIMATE FIX ////////
  //////////////////////////////////////////
  if (import.meta.env.DEV) {
    window.setTimeout(animateSubtitles, 100);
    window.setTimeout(animateHeadings, 50);
  } else {
    animateSubtitles();
    animateHeadings();
  }
  //////////////////////////////////////////
  /////// END DEV ENV ANIMATE FIX //////////
  //////////////////////////////////////////

  //initHeroSlider();
  //animateContactButtons();
  //animateDemoImages();
  //animateSection24();
  //animateServiceCards();
};

const init = () => {
  preloader();
  ayaMotifSVGDraw();
  scrollToTop();
  stickyHeader();
  //LenisScroll.init();
  cwpParallax();
  themeToggle();
  activeMenu();
  sideMenu();
  gsapAnimations();
  //searchPopup();
  //revealUpAnimation();
  //revealFadeAnimation();
};

if (document.readyState === "loading") {
  document.addEventListener("DOMContentLoaded", init);
} else {
  init();
}
/*
window.addEventListener('load', () => {
  resizeHeaderHeight();
});
*/
