// WordPress globals (no npm imports in this theme).
const { registerBlockType } = wp.blocks;
const { createElement, Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps } = wp.blockEditor;
const { Button, ColorPicker, PanelBody, SelectControl, TextControl } = wp.components;
const { useSelect } = wp.data;

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

const getMediaPreviewUrl = (media) => {
  if (!media) {
    return '';
  }

  if (media.source_url) {
    return media.source_url;
  }

  const sizes = media.media_details?.sizes;
  if (sizes?.full?.source_url) {
    return sizes.full.source_url;
  }

  return '';
};

// Editor-only preview (no inputs in the canvas).
// Uses lightweight styling from blocks/hero-header/editor.css.
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
      { className: 'csv-hero-header-editor__inner' },
      createElement(
        'span',
        {
          className: heroTextColor === 'white'
            ? 'csv-hero-header-editor__eyebrow csv-hero-header-editor__eyebrow--white'
            : 'csv-hero-header-editor__eyebrow',
        },
        eyebrow || 'Hero eyebrow'
      ),
      createElement(
        'h1',
        {
          className: [
            'csv-hero-header-editor__title',
            titleSize === 'large' ? 'csv-hero-header-editor__title--large' : '',
            heroTextColor === 'white' ? 'csv-hero-header-editor__title--white' : '',
          ].filter(Boolean).join(' '),
        },
        title || 'Hero title'
      ),
      createElement(
        'p',
        {
          className: heroTextColor === 'white'
            ? 'csv-hero-header-editor__description csv-hero-header-editor__description--white'
            : 'csv-hero-header-editor__description',
        },
        description || 'Hero description'
      ),
      createElement(
        'div',
        { className: 'csv-hero-header-editor__buttons' },
        createElement('a', { href: '#' }, button1Text || 'Button 1 text'),
        createElement('a', { href: '#' }, button2Text || 'Button 2 text')
      )
    )
  )
);

registerBlockType('csv/hero-header', {
  // Sidebar controls + canvas preview.
  edit: ({ attributes, setAttributes }) => {
    const media = useSelect(
      (select) => (
        attributes.backgroundImageId
          ? select('core').getMedia(attributes.backgroundImageId)
          : null
      ),
      [attributes.backgroundImageId]
    );
    const previewImageUrl = getMediaPreviewUrl(media);
    const editorProps = useBlockProps({
      className: 'csv-hero-header-editor',
      style: previewImageUrl
        ? {
            backgroundImage: `url(${previewImageUrl})`,
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
          // Media picker saves ID only; preview resolves via wp.data.
          createElement(
            MediaUploadCheck,
            null,
            createElement(MediaUpload, {
              onSelect: (media) => setAttributes({
                backgroundImageId: media?.id || null,
              }),
              allowedTypes: ['image'],
              value: attributes.backgroundImageId,
              render: ({ open }) => (
                createElement(
                  Button,
                  { variant: 'secondary', onClick: open },
                  attributes.backgroundImageId ? 'Replace Background Image' : 'Select Background Image'
                )
              ),
            })
          ),
          attributes.backgroundImageId
            ? createElement(
                Button,
                {
                  variant: 'tertiary',
                  isDestructive: true,
                  onClick: () => setAttributes({ backgroundImageId: null }),
                },
                'Remove Background Image'
              )
            : null,
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
  // Dynamic block; front-end renders in PHP.
  save: () => null,
});
