// WordPress globals (no npm imports in this theme).
const { registerBlockType } = wp.blocks;
const { createElement, Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps } = wp.blockEditor;
const { Button, ColorPicker, PanelBody, SelectControl, TextControl } = wp.components;

// Normalize ColorPicker output into a stable string for block attributes.
const normalizeColorValue = (value) => {
  if (typeof value === 'string') {
    return value;
  }

  if (value && typeof value === 'object') {
    if (value.hex) {
      return value.hex;
    }

    if (value.rgb) {
      const { r, g, b, a } = value.rgb;
      if (typeof a === 'number') {
        return `rgba(${r}, ${g}, ${b}, ${a})`;
      }
      return `rgb(${r}, ${g}, ${b})`;
    }
  }

  return '';
};

// Front-end markup (save output). Matches the theme's Tailwind-driven structure.
const renderHero = ({
  eyebrow,
  title,
  titleSize,
  heroTextColor,
  description,
  button1Text,
  button1Url,
  button2Text,
  button2Url,
}, blockProps) => (
  createElement(
    'section',
    blockProps,
    createElement(
      'div',
      {
        className: heroTextColor === 'white'
          ? 'hero-wrapper white'
          : 'hero-wrapper',
      },
      createElement(
        'div',
        { className: 'hero-eyebrow-wrapper' },
        createElement(
          'span',
          { className: 'hero-eyebrow' },
          eyebrow || 'Hero eyebrow'
        )
      ),
      createElement(
        'h1',
        { className: titleSize === 'large' ? 'hero-title large' : 'hero-title' },
        title || 'Hero title'
      ),
      createElement(
        'p',
        { className: 'hero-description' },
        description || 'Hero description'
      ),
      createElement(
        'div',
        { className: 'hero-actions-wrapper' },
        createElement(
          'a',
          { className: 'cwp-btn cwp-btn--primary', href: button1Url || '#' },
          button1Text || 'Button 1 text'
        ),
        createElement(
          'a',
          { className: 'cwp-btn cwp-btn--secondary', href: button2Url || '#' },
          button2Text || 'Button 2 text'
        )
      )
    )
  )
);

// Editor-only preview (no inputs in the canvas).
// Uses lightweight styling from blocks/hero/editor.css.
const renderEditorPreview = ({
  eyebrow,
  title,
  titleSize,
  heroTextColor,
  description,
  button1Text,
  button2Text,
}, blockProps) => (
  createElement(
    'div',
    blockProps,
    createElement(
      'div',
      { className: 'cwp-hero-editor__inner' },
      createElement(
        'span',
        {
          className: heroTextColor === 'white'
            ? 'cwp-hero-editor__eyebrow cwp-hero-editor__eyebrow--white'
            : 'cwp-hero-editor__eyebrow',
        },
        eyebrow || 'Hero eyebrow'
      ),
      createElement(
        'h1',
        {
          className: [
            'cwp-hero-editor__title',
            titleSize === 'large' ? 'cwp-hero-editor__title--large' : '',
            heroTextColor === 'white' ? 'cwp-hero-editor__title--white' : '',
          ].filter(Boolean).join(' '),
        },
        title || 'Hero title'
      ),
      createElement(
        'p',
        {
          className: heroTextColor === 'white'
            ? 'cwp-hero-editor__description cwp-hero-editor__description--white'
            : 'cwp-hero-editor__description',
        },
        description || 'Hero description'
      ),
      createElement(
        'div',
        { className: 'cwp-hero-editor__buttons' },
        createElement('a', { href: '#' }, button1Text || 'Button 1 text'),
        createElement('a', { href: '#' }, button2Text || 'Button 2 text')
      )
    )
  )
);

registerBlockType('cwp/hero', {
  // Sidebar controls + canvas preview.
  edit: ({ attributes, setAttributes }) => {
    const editorProps = useBlockProps({
      className: 'cwp-hero-editor',
      style: attributes.backgroundImageUrl
        ? {
            backgroundImage: `url(${attributes.backgroundImageUrl})`,
            backgroundSize: 'cover',
            backgroundPosition: 'center',
            '--hero-overlay': attributes.overlayColor || 'rgba(0, 0, 0, 0.4)',
          }
        : { '--hero-overlay': attributes.overlayColor || 'rgba(0, 0, 0, 0.4)' },
    });

    return createElement(
      Fragment,
      null,
      createElement(
        InspectorControls,
        null,
        createElement(
          PanelBody,
          { title: 'Hero Content', initialOpen: true },
          // Text fields update block attributes.
          createElement(SelectControl, {
            label: 'Hero Text Color',
            value: attributes.heroTextColor || 'default',
            options: [
              { label: 'Default', value: 'default' },
              { label: 'White', value: 'white' },
            ],
            onChange: (value) => setAttributes({ heroTextColor: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Eyebrow',
            value: attributes.eyebrow,
            onChange: (value) => setAttributes({ eyebrow: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Title',
            value: attributes.title,
            onChange: (value) => setAttributes({ title: value }),
          }),
          createElement(SelectControl, {
            label: 'Hero Title Size',
            value: attributes.titleSize || 'default',
            options: [
              { label: 'Default', value: 'default' },
              { label: 'Large', value: 'large' },
            ],
            onChange: (value) => setAttributes({ titleSize: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Description',
            value: attributes.description,
            onChange: (value) => setAttributes({ description: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Button 1 Text',
            value: attributes.button1Text,
            onChange: (value) => setAttributes({ button1Text: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Button 1 URL',
            value: attributes.button1Url,
            onChange: (value) => setAttributes({ button1Url: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Button 2 Text',
            value: attributes.button2Text,
            onChange: (value) => setAttributes({ button2Text: value }),
          }),
          createElement(TextControl, {
            label: 'Hero Button 2 URL',
            value: attributes.button2Url,
            onChange: (value) => setAttributes({ button2Url: value }),
          })
        ),
        createElement(
          PanelBody,
          { title: 'Hero Media', initialOpen: false },
          // Media picker saves ID + URL so front end can render a background image.
          createElement(
            MediaUploadCheck,
            null,
            createElement(MediaUpload, {
              onSelect: (media) => setAttributes({
                backgroundImageId: media?.id || null,
                backgroundImageUrl: media?.url || '',
              }),
              allowedTypes: ['image'],
              value: attributes.backgroundImageId,
              render: ({ open }) => (
                createElement(
                  Button,
                  { variant: 'secondary', onClick: open },
                  attributes.backgroundImageUrl ? 'Replace Background Image' : 'Select Background Image'
                )
              ),
            })
          ),
          // Overlay color sets a CSS variable used by ::before in theme CSS.
          createElement('p', null, 'Hero Overlay Color'),
          createElement(ColorPicker, {
            color: attributes.overlayColor || 'rgba(0, 0, 0, 0.4)',
            onChangeComplete: (value) => setAttributes({ overlayColor: normalizeColorValue(value) }),
            disableAlpha: false,
          })
        )
      ),
      // Canvas preview updates live as attributes change.
      renderEditorPreview(attributes, editorProps)
    );
  },
  // Saved markup for the front end.
  save: ({ attributes }) => {
    const blockProps = useBlockProps.save({
      className: 'page-hero',
      style: {
        ...(attributes.backgroundImageUrl ? { backgroundImage: `url(${attributes.backgroundImageUrl})` } : {}),
        '--hero-overlay': attributes.overlayColor || 'rgba(0, 0, 0, 0.4)',
      },
    });

    return renderHero(attributes, blockProps);
  },
});
