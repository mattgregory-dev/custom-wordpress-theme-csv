// WordPress globals (no npm imports in this theme).
const { registerBlockType } = wp.blocks;
const { createElement, Fragment } = wp.element;
const { InspectorControls, MediaUpload, MediaUploadCheck, useBlockProps } = wp.blockEditor;
const { Button, PanelBody, TextControl } = wp.components;

const renderNextStep = ({
  eyebrow,
  title,
  description,
  buttonText,
  buttonUrl,
  imageUrl,
}, blockProps) => (
  createElement(
    'section',
    blockProps,
    createElement(
      'div',
      { className: 'max-w-4xl mx-auto' },
      createElement(
        'div',
        { className: 'grid grid-cols-12 gap-12 items-center' },
        createElement(
          'div',
          { className: 'col-span-5' },
          createElement(
            'div',
            { className: 'aspect-square bg-gray-100 flex items-center justify-center' },
            imageUrl
              ? createElement('img', {
                  src: imageUrl,
                  alt: '',
                  className: 'w-full h-full object-cover',
                })
              : createElement('span', { className: 'text-gray-400 text-sm' }, '[ IMAGE ]')
          )
        ),
        createElement(
          'div',
          { className: 'col-span-7' },
          createElement(
            'div',
            { className: 'mb-6' },
            createElement(
              'span',
              { className: 'text-xs tracking-[0.2em] text-gray-600' },
              eyebrow || 'eyebrow'
            )
          ),
          createElement(
            'h2',
            { className: 'text-5xl mb-8 tracking-tight' },
            title || 'title'
          ),
          createElement(
            'p',
            { className: 'text-lg leading-relaxed mb-10 max-w-lg' },
            description || 'description'
          ),
          createElement(
            'div',
            { className: 'space-y-4' },
            createElement(
              'a',
              {
                className: 'cwp-btn cwp-btn--primary',
                href: buttonUrl || '#',
              },
              `${buttonText || 'button text'} \u2192`
            )
          )
        )
      )
    )
  )
);

const renderEditorPreview = ({
  eyebrow,
  title,
  description,
  buttonText,
  buttonUrl,
  imageUrl,
}, blockProps) => (
  createElement(
    'section',
    blockProps,
    createElement(
      'div',
      { className: 'cwp-next-step-editor__container' },
      createElement(
        'div',
        { className: 'cwp-next-step-editor__grid' },
        createElement(
          'div',
          { className: 'cwp-next-step-editor__media' },
          createElement(
            'div',
            { className: 'cwp-next-step-editor__media-frame' },
            imageUrl
              ? createElement('img', {
                  src: imageUrl,
                  alt: '',
                  className: 'cwp-next-step-editor__media-image',
                })
              : createElement('span', { className: 'cwp-next-step-editor__media-placeholder' }, '[ IMAGE ]')
          )
        ),
        createElement(
          'div',
          { className: 'cwp-next-step-editor__content' },
          createElement(
            'div',
            { className: 'cwp-next-step-editor__eyebrow' },
            eyebrow || 'eyebrow'
          ),
          createElement(
            'h2',
            { className: 'cwp-next-step-editor__title' },
            title || 'title'
          ),
          createElement(
            'p',
            { className: 'cwp-next-step-editor__description' },
            description || 'description'
          ),
          createElement(
            'a',
            {
              className: 'cwp-next-step-editor__button',
              href: buttonUrl || '#',
            },
            `${buttonText || 'button text'} \u2192`
          )
        )
      )
    )
  )
);

registerBlockType('cwp/next-step', {
  edit: ({ attributes, setAttributes }) => {
    const editorProps = useBlockProps({
      className: 'cwp-next-step-editor',
    });

    return createElement(
      Fragment,
      null,
      createElement(
        InspectorControls,
        null,
        createElement(
          PanelBody,
          { title: 'Next Step Content', initialOpen: true },
          createElement(TextControl, {
            label: 'Eyebrow',
            value: attributes.eyebrow,
            onChange: (value) => setAttributes({ eyebrow: value }),
          }),
          createElement(TextControl, {
            label: 'Title',
            value: attributes.title,
            onChange: (value) => setAttributes({ title: value }),
          }),
          createElement(TextControl, {
            label: 'Description',
            value: attributes.description,
            onChange: (value) => setAttributes({ description: value }),
          }),
          createElement(TextControl, {
            label: 'Button Text',
            value: attributes.buttonText,
            onChange: (value) => setAttributes({ buttonText: value }),
          }),
          createElement(TextControl, {
            label: 'Button URL',
            value: attributes.buttonUrl,
            onChange: (value) => setAttributes({ buttonUrl: value }),
          })
        ),
        createElement(
          PanelBody,
          { title: 'Next Step Image', initialOpen: false },
          createElement(
            MediaUploadCheck,
            null,
            createElement(MediaUpload, {
              onSelect: (media) => setAttributes({
                imageId: media?.id || null,
                imageUrl: media?.url || '',
              }),
              allowedTypes: ['image'],
              value: attributes.imageId,
              render: ({ open }) => (
                createElement(
                  Button,
                  { variant: 'secondary', onClick: open },
                  attributes.imageUrl ? 'Replace Image' : 'Select Image'
                )
              ),
            })
          )
        )
      ),
      renderEditorPreview(attributes, editorProps)
    );
  },
  save: ({ attributes }) => {
    const blockProps = useBlockProps.save({
      className: 'py-32 px-8 bg-[#c3ddd5]',
    });

    return renderNextStep(attributes, blockProps);
  },
});
