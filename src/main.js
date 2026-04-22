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
// gsap.registerPlugin(ScrollTrigger);

// let drawSvgReady = false;
// let drawSvgPromise = null;

// Lazy-load GSAP DrawSVG plugin when needed.
// const loadDrawSVGPlugin = () => {
//   if (drawSvgReady) return Promise.resolve();
//   if (drawSvgPromise) return drawSvgPromise;

//   drawSvgPromise = import("gsap/DrawSVGPlugin")
//     .then((module) => {
//       const plugin = module.DrawSVGPlugin || module.default;
//       if (!plugin) return;
//       gsap.registerPlugin(plugin);
//       drawSvgReady = true;
//     })
//     .catch((error) => {
//       drawSvgPromise = null;
//       throw error;
//     });

//   return drawSvgPromise;
// };

// Animated SVG motif (DrawSVG).
// const ayaMotifSVGDraw = () => {
//   const init = () => {
//     const aya = document.getElementById("aya_motif");
//     if (!aya) return;
//     if (!gsap) return;

//     const drawable = aya.querySelectorAll("path, line, polyline, polygon, ellipse, circle, rect");
//     if (!drawable.length) return;

//     // ensure SVG is visible before drawing
//     gsap.set(aya, { opacity: 1, visibility: "visible" });

//     const prefersReducedMotion = window.matchMedia &&
//       window.matchMedia("(prefers-reduced-motion: reduce)").matches;
//     if (prefersReducedMotion) {
//       // skip animation for reduced motion
//       gsap.set(drawable, { drawSVG: "0% 100%" });
//       return;
//     }
//     // initial draw state
//     gsap.set(drawable, { drawSVG: "0% 0%" });

//     const groups = {
//       center: aya.querySelectorAll("#center path, #center line, #center polyline, #center polygon, #center ellipse, #center circle, #center rect"),
//       centerRing: aya.querySelectorAll("#center_ring path, #center_ring line, #center_ring polyline, #center_ring polygon, #center_ring ellipse, #center_ring circle, #center_ring rect"),
//       details: aya.querySelectorAll("#details path, #details line, #details polyline, #details polygon, #details ellipse, #details circle, #details rect"),
//       circle: aya.querySelectorAll("#circle path, #circle line, #circle polyline, #circle polygon, #circle ellipse, #circle circle, #circle rect")
//     };

//     const tl = gsap.timeline({
//       // dial: per-group draw duration + easing
//       defaults: { duration: 0.7, ease: "power1.inOut" }
//     });
//     // dial: fade-in speed + per-element opacity stagger
//     tl.to(drawable, { opacity: 1, duration: 0.6, stagger: 0.005 }, 0);

//     if (groups.circle.length) {
//       // dial: overlap timing between groups
//       tl.to(groups.circle, { drawSVG: "0% 100%", stagger: 0.01 }, 0);
//     }
//     if (groups.center.length) {
//       // dial: center line draw stagger
//       tl.to(groups.center, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
//     }
//     if (groups.centerRing.length) {
//       // dial: overlap timing between groups
//       tl.to(groups.centerRing, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
//     }
//     if (groups.details.length) {
//       // dial: overlap timing between groups
//       tl.to(groups.details, { drawSVG: "0% 100%", stagger: 0.01 }, ">-0.2");
//     }
//   };

//   const startWhenVisible = () => {
//     const aya = document.getElementById("aya_motif");
//     if (!aya) return;

//     const runInit = () => {
//       loadDrawSVGPlugin()
//         .then(() => init())
//         .catch(() => {});
//     };

//     if (!("IntersectionObserver" in window)) {
//       window.setTimeout(runInit, 300); // dial: delay before starting when IO is unavailable
//       return;
//     }

//     const io = new IntersectionObserver((entries) => {
//       entries.forEach((entry) => {
//         if (!entry || !entry.isIntersecting) return;
//         io.unobserve(entry.target);
//         window.setTimeout(runInit, 300); // dial: delay after entering viewport
//       });
//     }, { threshold: 0.35 }); // dial: how much of SVG must be visible before starting

//     io.observe(aya);
//   };

//   startWhenVisible();
// };

// Anchor link handling with Lenis compatibility.
const smoothAnchors = () => {
  const getHeaderOffset = () => {
    const header = document.querySelector('.sticky-active');
    if (!header) return 0;
    const styles = window.getComputedStyle(header);
    const isFixed = styles.position === 'fixed' || styles.position === 'sticky';
    return isFixed ? header.offsetHeight : 0;
  };

  const scrollToHash = (hash, updateHistory = true) => {
    if (!hash) return;
    const id = hash.charAt(0) === '#' ? hash : `#${hash}`;
    const target = document.querySelector(id);
    if (!target) return false;

    const offset = getHeaderOffset();
    if (LenisScroll.getInstance()) {
      LenisScroll.scrollTo(target, { offset: -offset, duration: 2.1 });
    } else {
      const top = target.getBoundingClientRect().top + window.scrollY - offset;
      window.scrollTo({ top, behavior: 'smooth' });
    }

    if (updateHistory) {
      history.pushState(null, '', id);
    }

    return true;
  };

  document.addEventListener('click', (event) => {
    const link = event.target.closest('a[href]');
    if (!link) return;

    const href = link.getAttribute('href');
    if (!href || href === '#' || href.startsWith('mailto:') || href.startsWith('tel:')) {
      return;
    }

    let url;
    try {
      url = new URL(link.href, window.location.href);
    } catch (error) {
      return;
    }

    const isSamePage = url.origin === window.location.origin
      && url.pathname.replace(/\/+$/, '') === window.location.pathname.replace(/\/+$/, '')
      && url.hash;

    if (!isSamePage) return;

    if (!scrollToHash(url.hash)) return;
    event.preventDefault();
  });

  window.addEventListener('hashchange', () => {
    scrollToHash(window.location.hash, false);
  });

  if (window.location.hash) {
    window.setTimeout(() => scrollToHash(window.location.hash, false), 0);
  }
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
    if (LenisScroll.getInstance()) {
      LenisScroll.scrollTo(0, { duration: 2.1 });
      return;
    }

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

  const stickyOffset = 400;
  const revealOffset = 120;
  const deltaThreshold = 8;

  let lastScrollY = window.scrollY || 0;
  let ticking = false;
  let usingLenis = false;

  const updateHeaderState = (scrollY) => {
    const currentScroll = Math.max(0, Number(scrollY) || 0);
    const isSticky = currentScroll > stickyOffset;

    header.classList.toggle('is-sticky', isSticky);

    if (!isSticky) {
      header.classList.remove('is-hidden');
      lastScrollY = currentScroll;
      return;
    }

    const delta = currentScroll - lastScrollY;
    if (Math.abs(delta) < deltaThreshold) return;

    if (delta > 0 && currentScroll > revealOffset) {
      header.classList.add('is-hidden');
    } else {
      header.classList.remove('is-hidden');
    }

    lastScrollY = currentScroll;
  };

  const onScroll = () => {
    if (usingLenis) return;
    if (ticking) return;
    ticking = true;
    const currentScroll = window.scrollY || 0;
    window.requestAnimationFrame(() => {
      updateHeaderState(currentScroll);
      ticking = false;
    });
  };

  const bindLenis = () => {
    const lenis = LenisScroll.getInstance();
    if (!lenis || typeof lenis.on !== 'function') return false;

    usingLenis = true;
    lenis.on('scroll', ({ scroll }) => {
      updateHeaderState(scroll);
    });
    updateHeaderState(lenis.scroll || window.scrollY || 0);
    return true;
  };

  onScroll();
  window.addEventListener('scroll', onScroll, { passive: true });

  if (!bindLenis()) {
    let attempts = 0;
    const maxAttempts = 20;
    const tryBind = () => {
      if (bindLenis()) return;
      attempts += 1;
      if (attempts >= maxAttempts) return;
      window.setTimeout(tryBind, 250);
    };
    window.setTimeout(tryBind, 250);
  }
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
// const csvParallax = () => {
//   const parallaxSections = Array.from(
//     document.querySelectorAll(".parallax-banner")
//   )
//     .map((section) => {
//       const wrap = section.querySelector(".parallax-wrap");
//       const img = section.querySelector(".parallax-img");
//       if (!wrap || !img) return null;
//       return {
//         section,
//         wrap,
//         img,
//         maxTranslate: 0,
//       };
//     })
//     .filter(Boolean);

//   if (!parallaxSections.length) return;

//   let ticking = false;

//   const updateMetrics = () => {
//     parallaxSections.forEach((item) => {
//       const sectionHeight = item.section.offsetHeight;
//       const wrapHeight = item.wrap.offsetHeight;
//       const extra = Math.max(0, wrapHeight - sectionHeight);
//       item.maxTranslate = extra / 2;
//     });
//   };

//   const updateParallax = () => {
//     const viewportHeight = window.innerHeight;

//     parallaxSections.forEach((item) => {
//       const rect = item.section.getBoundingClientRect();
//       if (rect.bottom < 0 || rect.top > viewportHeight) return;

//       const progress = (viewportHeight - rect.top) / (viewportHeight + rect.height);
//       const clamped = Math.min(1, Math.max(0, progress));
//       const translate = (clamped - 0.5) * 2 * item.maxTranslate;

//       item.img.style.transform = `translate3d(0, ${translate.toFixed(2)}px, 0)`;
//     });

//     ticking = false;
//   };

//   const requestUpdate = () => {
//     if (ticking) return;
//     ticking = true;
//     window.requestAnimationFrame(updateParallax);
//   };

//   const onResize = () => {
//     updateMetrics();
//     requestUpdate();
//   };

//   window.addEventListener("scroll", requestUpdate, { passive: true });
//   window.addEventListener("resize", onResize);

//   if ("ResizeObserver" in window) {
//     const ro = new ResizeObserver(() => {
//       updateMetrics();
//       requestUpdate();
//     });
//     parallaxSections.forEach((item) => ro.observe(item.section));
//   }

//   updateMetrics();
//   updateParallax();
// };

// Dark/light theme toggle logic.
// const themeToggle = () => {
//   const body = document.body;
//   const themeBtn = document.getElementById("themeBtn");
//   const darkModeImages = document.querySelectorAll(
//     ".darkModeTrigger, .darkModeTriggerImg, .darkModeTriggerImg2"
//   );

//   if (localStorage.getItem("themeMode") === "active") {
//     body.classList.add("active-body", "dark-mode");
//     if (themeBtn) themeBtn.classList.add("active-btn");
//   }

//   const toggleDarkMode = () => {
//     if (!body.classList.contains("active-body")) {
//       body.classList.add("active-body", "dark-mode");
//       if (themeBtn) themeBtn.classList.add("active-btn");
//       localStorage.setItem("themeMode", "active");
//       localStorage.setItem("darkMode", "enabled");
//       return;
//     }

//     body.classList.remove("active-body", "dark-mode");
//     if (themeBtn) themeBtn.classList.remove("active-btn");
//     localStorage.setItem("themeMode", "inactive");
//     localStorage.setItem("darkMode", "disabled");
//   };

//   if (themeBtn) {
//     themeBtn.addEventListener("click", () => {
//       toggleDarkMode();
//     });
//   }

//   darkModeImages.forEach((el) => {
//     el.addEventListener("click", (event) => {
//       event.preventDefault();
//       toggleDarkMode();
//     });
//   });
// };

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

  const setMenuState = (menu, isOpen, sourceToggle = null) => {
    if (!menu) return;
    menu.classList.toggle("active", isOpen);
    menu.classList.toggle("open", isOpen);
    menu.setAttribute("aria-hidden", isOpen ? "false" : "true");

    if (sourceToggle) {
      sourceToggle.classList.toggle("open", isOpen);
      sourceToggle.setAttribute("aria-expanded", isOpen ? "true" : "false");
    }
  };

  toggles.forEach((toggle) => {
    toggle.addEventListener("click", () => {
      const menuName = toggle.getAttribute("data-menu");
      const menu = document.querySelector(
        `.side-menu[data-menu="${menuName}"]`
      );

      if (menu) {
        setMenuState(menu, true, toggle);
        overlay.classList.add("active");
        overlay.classList.add("open");
        lockScroll();
      }
    });
  });

  closeBtns.forEach((closeBtn) => {
    closeBtn.addEventListener("click", () => {
      const menu = closeBtn.closest(".side-menu");
      if (!menu) return;
      setMenuState(menu, false);
      overlay.classList.remove("active");
      overlay.classList.remove("open");
      unlockScroll();
      menu.querySelectorAll(".active").forEach((el) => {
        el.classList.remove("active");
      });
    });
  });

  overlay.addEventListener("click", () => {
    sideMenus.forEach((menu) => {
      setMenuState(menu, false);
      menu.querySelectorAll(".active").forEach((el) => {
        el.classList.remove("active");
      });
    });
    overlay.classList.remove("active");
    overlay.classList.remove("open");
    unlockScroll();
  });

  document.addEventListener("keydown", (event) => {
    if (event.key !== "Escape") return;
    sideMenus.forEach((menu) => {
      setMenuState(menu, false);
    });
    overlay.classList.remove("active");
    overlay.classList.remove("open");
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

// Simple reveal animation for `.reveal` elements.
const revealOnScroll = () => {
  const elements = document.querySelectorAll('.reveal');
  if (!elements.length) return;

  const prefersReducedMotion = window.matchMedia &&
    window.matchMedia('(prefers-reduced-motion: reduce)').matches;

  if (prefersReducedMotion || !('IntersectionObserver' in window)) {
    elements.forEach((el) => el.classList.add('visible'));
    return;
  }

  const io = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (!entry || !entry.isIntersecting) return;
        entry.target.classList.add('visible');
        io.unobserve(entry.target);
      });
    },
    { threshold: 0.12, rootMargin: '0px 0px -40px 0px' }
  );

  elements.forEach((el) => io.observe(el));
};

const initFaqAccordions = () => {
  const items = document.querySelectorAll('.faq-item');
  if (!items.length) return;

  let uid = 1;
  items.forEach((item) => {
    const button = item.querySelector('.faq-q');
    const panel = item.querySelector('.faq-a');
    if (!button || !panel) return;

    if (!button.id) {
      button.id = `faq-q-${uid}`;
    }
    if (!panel.id) {
      panel.id = `faq-a-${uid}`;
    }
    uid += 1;

    button.setAttribute('aria-controls', panel.id);
    panel.setAttribute('aria-labelledby', button.id);

    const isOpen = item.classList.contains('is-open');
    button.setAttribute('aria-expanded', String(isOpen));
    panel.setAttribute('aria-hidden', String(!isOpen));

    button.addEventListener('click', () => {
      const nowOpen = !item.classList.contains('is-open');
      item.classList.toggle('is-open', nowOpen);
      button.setAttribute('aria-expanded', String(nowOpen));
      panel.setAttribute('aria-hidden', String(!nowOpen));
    });
  });
};

// GSAP subtitle reveal animation.
// const animateSubtitles = () => {
//   const subtitles = document.querySelectorAll('.sec-title .sub-title');

//   subtitles.forEach((sub) => {
//     if (sub.dataset.wrapped === 'true') return;
//     const text = sub.textContent.trim();
//     sub.innerHTML = `<span class="sub-text">${text}</span>`;
//     const innerSpan = sub.querySelector('.sub-text');
//     if (!innerSpan) return;
//     sub.dataset.wrapped = 'true';

//     gsap.set(innerSpan, {
//       width: 1,
//       display: 'inline-block',
//       overflow: 'hidden',
//     });

//     gsap.to(innerSpan, {
//       width: innerSpan.scrollWidth,
//       duration: 1.2,
//       ease: 'power2.out',
//       scrollTrigger: {
//         trigger: sub.closest('.sec-title'),
//         start: 'top 90%',
//         toggleActions: 'play none none none',
//       },
//     });
//   });
// };

// GSAP letter-by-letter heading animation.
// const animateHeadings = () => {
//   const headings = document.querySelectorAll('.title.animated-heading');

//   headings.forEach((title) => {
//     if (title.dataset.wrapped === 'true') return;
//     const words = title.textContent.trim().split(/\s+/);

//     const wrappedWords = words
//       .map((word) => {
//         const letters = word
//           .split('')
//           .map((letter) => `<span class="letter">${letter}</span>`)
//           .join('');
//         return `<span class="word">${letters}</span>`;
//       })
//       .join('<span class="space"> </span>');

//     title.innerHTML = wrappedWords;
//     title.dataset.wrapped = 'true';

//     const letters = title.querySelectorAll('.letter');

//     gsap.from(letters, {
//       y: 40,
//       opacity: 0,
//       stagger: 0.04,
//       duration: 0.9,
//       ease: 'power3.out',
//       delay: 0.3,
//       scrollTrigger: {
//         trigger: title,
//         start: 'top 85%',
//         once: true,
//       },
//     });
//   });
// };

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
  const header = document.querySelector('.csv-header-absolute');
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

  const pathMatchesCurrent = (href) => {
    if (!href || href === "#" || href.indexOf("mailto:") === 0 || href.indexOf("tel:") === 0) {
      return false;
    }

    try {
      const url = new URL(href, window.location.origin);
      const linkPath = url.pathname.replace(/\/+$/, "") || "/";
      return linkPath === currentPath;
    } catch (error) {
      return false;
    }
  };

  const setActive = (menuLi) => {
    const links = menuLi.querySelectorAll("a");
    let found = false;

    for (let i = 0; i < links.length; i++) {
      const link = links[i];
      const href = link.getAttribute("href");
      if (pathMatchesCurrent(href)) {
        link.classList.add("active");
        found = true;
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

  const drawerLinks = document.querySelectorAll(".side-menu.menu-drawer .nav-section .nav-item");
  drawerLinks.forEach((link) => {
    link.classList.toggle("active", pathMatchesCurrent(link.getAttribute("href")));
  });

  const drawerActionLinks = document.querySelectorAll(".side-menu.menu-drawer .drawer-actions .action-btn");
  drawerActionLinks.forEach((link) => {
    link.classList.toggle("active", pathMatchesCurrent(link.getAttribute("href")));
  });
};

// GSAP animation orchestrator.
// const gsapAnimations = () => {
//   if (typeof gsap === 'undefined' || typeof ScrollTrigger === 'undefined') return;

//   //////////////////////////////////////////
//   /////// START DEV ENV ANIMATE FIX ////////
//   //////////////////////////////////////////
//   if (import.meta.env.DEV) {
//     window.setTimeout(animateSubtitles, 100);
//     window.setTimeout(animateHeadings, 50);
//   } else {
//     animateSubtitles();
//     animateHeadings();
//   }
//   //////////////////////////////////////////
//   /////// END DEV ENV ANIMATE FIX //////////
//   //////////////////////////////////////////

//   //initHeroSlider();
//   //animateContactButtons();
//   //animateDemoImages();
//   //animateSection24();
//   //animateServiceCards();
// };

// const initAcfMaps = () => {
//   const mapEls = document.querySelectorAll('.acf-map');
//   if (!mapEls.length) return;

//   const isGoogleReady = () =>
//     typeof window.google !== 'undefined' &&
//     window.google.maps &&
//     typeof window.google.maps.Map === 'function';

//   const maxRetries = 25;
//   let retryCount = 0;

//   if (!isGoogleReady()) {
//     retryCount += 1;
//     if (retryCount <= maxRetries) {
//       window.setTimeout(initAcfMaps, 200);
//     }
//     return;
//   }

//   const initMap = (mapEl) => {
//     if (mapEl.dataset.mapInitialized === 'true') return;
//     mapEl.dataset.mapInitialized = 'true';

//     const zoom = Number.parseInt(mapEl.dataset.zoom || '16', 10);
//     const markerEls = Array.from(mapEl.querySelectorAll('.marker'));

//     const map = new window.google.maps.Map(mapEl, {
//       zoom: Number.isNaN(zoom) ? 16 : zoom,
//       mapTypeId: window.google.maps.MapTypeId.ROADMAP,
//     });

//     map.markers = [];

//     markerEls.forEach((markerEl) => {
//       let lat = Number.parseFloat(markerEl.dataset.lat);
//       let lng = Number.parseFloat(markerEl.dataset.lng);

//       if (Number.isNaN(lat) || Number.isNaN(lng)) {
//         return;
//       }

//       const marker = new window.google.maps.Marker({
//         position: { lat, lng },
//         map,
//       });

//       map.markers.push(marker);

//       const infoContent = markerEl.innerHTML.trim();
//       if (infoContent) {
//         const infoWindow = new window.google.maps.InfoWindow({
//           content: infoContent,
//         });
//         marker.addListener('click', () => {
//           infoWindow.open(map, marker);
//         });
//       }
//     });

//     if (!map.markers.length) return;

//     const bounds = new window.google.maps.LatLngBounds();
//     map.markers.forEach((marker) => {
//       bounds.extend(marker.getPosition());
//     });

//     if (map.markers.length === 1) {
//       map.setCenter(bounds.getCenter());
//     } else {
//       map.fitBounds(bounds);
//     }
//   };

//   mapEls.forEach((mapEl) => {
//     initMap(mapEl);
//   });
// };

// Feather Jones - Free Class Popup.
const initFreeClassPopup = () => {
  // Display timing + cookie settings.
  const POPUP_DELAY_MS = 6000;
  const COOKIE_NAME = 'fj_popup_seen';
  const COOKIE_DAYS = 1;
  const FORCE_POPUP = false;

  // Core element lookups.
  const offerVariant =
    document.documentElement.getAttribute('data-offer-variant') === 'b' ? 'b' : 'a';
  const overlay =
    document.querySelector(`.popup-overlay[data-offer-popup="${offerVariant}"]`) ||
    document.querySelector('.popup-overlay[data-offer-popup="a"]') ||
    document.querySelector('.popup-overlay[data-offer-popup="b"]');
  if (!overlay) return;

  const card = overlay.querySelector('.popup-card');
  const closeBtn = overlay.querySelector('.popup-close');
  const ctaBtn = overlay.querySelector('[data-popup-action="cta"]');
  const skipBtn = overlay.querySelector('[data-popup-action="skip"]');
  const getPopupForm = () =>
    overlay.querySelector('form.forminator-ui') ||
    overlay.querySelector('form[data-form-id]') ||
    overlay.querySelector('form');
  let form = getPopupForm();
  const isForminatorForm = (node) =>
    !!(
      node &&
      (node.classList.contains('forminator-ui') ||
        node.hasAttribute('data-form-id') ||
        node.querySelector('.forminator-response-message'))
    );
  let isForminator = isForminatorForm(form);
  const errorEl = overlay.querySelector('[data-popup-error="true"]');
  const step1 = overlay.querySelector('[data-popup-step="1"]');
  const step2 = overlay.querySelector('[data-popup-step="2"]');
  const step3 = overlay.querySelector('[data-popup-step="3"]');
  if (!card || !closeBtn || !ctaBtn || !skipBtn || !errorEl || !step1 || !step2 || !step3) return;
  let step2At = 0;
  let step3Triggered = false;

  // Cookie helpers for "seen" state.
  const setCookie = (name, value, days) => {
    const dt = new Date();
    dt.setTime(dt.getTime() + days * 864e5);
    document.cookie = `${name}=${value};expires=${dt.toUTCString()};path=/;SameSite=Lax`;
  };

  const getCookie = (name) =>
    document.cookie.split('; ').find((row) => row.startsWith(`${name}=`));

  // Show/close + scroll lock.
  const showPopup = () => {
    overlay.classList.add('active');
    document.body.style.overflow = 'hidden';
  };

  const closePopup = () => {
    overlay.classList.remove('active');
    document.body.style.overflow = '';
    if (!FORCE_POPUP) {
      setCookie(COOKIE_NAME, '1', COOKIE_DAYS);
    }
  };

  // Step transitions.
  const goToStep2 = () => {
    step1.classList.remove('active');
    step2.classList.add('active');
    step2At = Date.now();
    window.setTimeout(() => {
      const emailInput = form ? form.querySelector('input[type="email"]') : null;
      if (emailInput) emailInput.focus();
    }, 100);
  };

  const goToStep3 = () => {
    if (step3Triggered) return;
    step3Triggered = true;
    step2.classList.remove('active');
    step3.classList.add('active');
    setCookie(COOKIE_NAME, '1', 30);
    window.setTimeout(() => {
      closePopup();
    }, 4000);
  };

  // Form validation + simulated submit success.
  const handleSubmit = (event) => {
    event.preventDefault();

    const emailEl = form.querySelector('input[type="email"]');
    const btn = form.querySelector('button[type="submit"]');

    errorEl.classList.remove('show');
    errorEl.textContent = '';

    // Basic email validation.
    const email = emailEl.value.trim();
    if (!email || !/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
      errorEl.textContent = 'Please enter a valid email address.';
      errorEl.classList.add('show');
      emailEl.focus();
      return;
    }

    // Basic bot-timing guard.
    if (step2At && Date.now() - step2At < 1500) {
      goToStep3();
      return;
    }

    // Simulated async success.
    btn.textContent = 'Sending...';
    btn.style.pointerEvents = 'none';
    btn.style.opacity = '0.8';
    window.setTimeout(() => {
      goToStep3();
    }, 1200);
  };

  // Primary UI event bindings.
  closeBtn.addEventListener('click', closePopup);
  ctaBtn.addEventListener('click', goToStep2);
  skipBtn.addEventListener('click', closePopup);
  if (form && !isForminator) {
    form.addEventListener('submit', handleSubmit);
  }

  // Forminator: advance to Step 3 when success message appears.
    if (form && isForminator) {
      const checkForminatorSuccess = () => {
        const successEl = overlay.querySelector(
          '.forminator-response-message.forminator-success'
        );
        if (!successEl) return;
        const computed = window.getComputedStyle(successEl);
        const isShown =
          successEl.classList.contains('forminator-show') ||
          successEl.getAttribute('aria-hidden') === 'false' ||
          successEl.style.display === 'block' ||
          computed.display !== 'none';
        if (isShown) {
          goToStep3();
        }
      };

    checkForminatorSuccess();

      const observer = new MutationObserver(checkForminatorSuccess);
    observer.observe(overlay, {
      attributes: true,
      attributeFilter: ['class', 'style', 'aria-hidden'],
      childList: true,
      subtree: true,
    });

      if (window.jQuery) {
        window.jQuery(document).on(
          'forminator:form:submit:success',
          (event, formId) => {
            const currentId = form.getAttribute('data-form-id');
            if (!currentId || !formId || `${formId}` === `${currentId}`) {
              checkForminatorSuccess();
            }
          }
      );
    }
  }

  // Click outside card closes overlay.
  overlay.addEventListener('click', (event) => {
    if (event.target === overlay) closePopup();
  });

  // Escape key closes overlay.
  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') closePopup();
  });

  // Mobile swipe-to-dismiss.
  (() => {
    let startY = 0;
    let currentY = 0;
    let dragging = false;

    card.addEventListener('touchstart', (event) => {
      const touch = event.touches[0];
      const rect = card.getBoundingClientRect();
      if (touch.clientY - rect.top > 50) return;
      startY = touch.clientY;
      dragging = true;
      card.style.transition = 'none';
    });

    card.addEventListener('touchmove', (event) => {
      if (!dragging) return;
      currentY = event.touches[0].clientY - startY;
      if (currentY > 0) {
        card.style.transform = `translateY(${currentY}px)`;
      }
    });

    card.addEventListener('touchend', () => {
      if (!dragging) return;
      dragging = false;
      card.style.transition = '';
      if (currentY > 120) {
        closePopup();
      }
      card.style.transform = '';
      currentY = 0;
    });
  })();

  // Auto-show after delay if no cookie.
  if (FORCE_POPUP || !getCookie(COOKIE_NAME)) {
    window.setTimeout(showPopup, POPUP_DELAY_MS);
  }
};

// LearnDash: keep course accordion expanded by default on single course template.
const initLearnDashAccordionExpandedDefault = () => {
  const templateRoot = document.querySelector('[data-ld-force-expand="true"]');
  if (!templateRoot) return;

  const selector = '.ld-accordion.ld-accordion--course';

  const forceExpand = () => {
    const accordions = document.querySelectorAll(selector);
    if (!accordions.length) return;

    accordions.forEach((accordion) => {
      const expandButtons = accordion.querySelectorAll(
        '.ld-accordion__expand-button[data-ld-expand-button="true"]'
      );

      expandButtons.forEach((button) => {
        const isExpanded =
          button.getAttribute('aria-expanded') === 'true' ||
          button.classList.contains('ld-expanded');

        if (!isExpanded) {
          button.click();
        }
      });
    });
  };

  forceExpand();

  // LearnDash can re-apply collapsed state after its own init; re-run briefly.
  [120, 320, 700, 1400, 2200].forEach((delay) => {
    window.setTimeout(forceExpand, delay);
  });

  const observer = new MutationObserver((mutations) => {
    let shouldRun = false;

    mutations.forEach((mutation) => {
      mutation.addedNodes.forEach((node) => {
        if (!(node instanceof Element)) return;

        if (
          node.matches(selector) ||
          node.querySelector(selector) ||
          node.matches('.ld-accordion__expand-button[data-ld-expand-button="true"]') ||
          node.querySelector('.ld-accordion__expand-button[data-ld-expand-button="true"]')
        ) {
          shouldRun = true;
        }
      });
    });

    if (shouldRun) {
      window.requestAnimationFrame(forceExpand);
    }
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
};

// Normalize Forminator submit button labels across offer placements.
const initForminatorButtonLabels = () => {
  const labelRules = [
    {
      selector: '.sidebar-form .forminator-button',
      text: 'Get Your Free Course',
    },
    {
      selector: '.popup-content .forminator-button',
      text: 'Send It',
    },
    {
      selector: '.forminator-cta-form .forminator-button',
      text: 'Send Me the Free Course',
    },
  ];
  const relevantSelector =
    '.forminator-button, .sidebar-form, .popup-content, .forminator-cta-form';
  let rafId = 0;
  let isApplying = false;

  const applyLabels = () => {
    isApplying = true;
    labelRules.forEach(({ selector, text }) => {
      document.querySelectorAll(selector).forEach((button) => {
        if (button.textContent.trim() !== text) {
          button.textContent = text;
        }
      });
    });
    isApplying = false;
  };

  const scheduleApplyLabels = () => {
    if (rafId) return;
    rafId = window.requestAnimationFrame(() => {
      rafId = 0;
      applyLabels();
    });
  };

  applyLabels();

  const observer = new MutationObserver((mutations) => {
    if (isApplying) {
      return;
    }

    const hasRelevantMutation = mutations.some((mutation) => {
      if (mutation.target instanceof Element) {
        if (
          mutation.target.matches(relevantSelector) ||
          mutation.target.closest(relevantSelector)
        ) {
          return true;
        }
      }

      return Array.from(mutation.addedNodes).some(
        (node) =>
          node instanceof Element &&
          (node.matches(relevantSelector) || node.querySelector(relevantSelector))
      );
    });

    if (!hasRelevantMutation) {
      return;
    }

    scheduleApplyLabels();
  });

  observer.observe(document.body, {
    childList: true,
    subtree: true,
  });
};

const init = () => {
  preloader();
  scrollToTop();
  stickyHeader();
  activeMenu();
  sideMenu();
  initFreeClassPopup();
  initLearnDashAccordionExpandedDefault();
  initForminatorButtonLabels();
  revealOnScroll();
  initFaqAccordions();
  //ayaMotifSVGDraw();
  //smoothAnchors();
  //LenisScroll.init();
  //csvParallax();
  //themeToggle();
  //gsapAnimations();
  //initAcfMaps();
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
