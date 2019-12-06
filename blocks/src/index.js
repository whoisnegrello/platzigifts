import { registerBlockType } from '@wordpress/blocks';

registerBlockType('pgb/basic-block', {
	title: 'Basic Block',
	description: 'Este bloque no tiene ninguna funcionalidad, simplemente es un Hello World.',
	icon: 'smiley',
	category: 'layout',
    keywords: [ 'wordpress', 'gutenberg', 'platzigift'],
    attributes: {
		content: {
			type: 'string',
			default: 'Hello world'
		}
	},
	edit: (props) => {
		const { attributes: { content }, setAttributes, className } = props;
		const handlerOnChangeInput = (event) => {
			setAttributes( { content: event.target.value } )
		}
		return <input
					class={ className }
					value={ content }
					onChange={ handlerOnChangeInput }
				/>
	},
	save: (props) => <h2 class={ props.className }>{ props.attributes.content }</h2>
});