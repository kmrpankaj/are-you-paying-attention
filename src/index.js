wp.blocks.registerBlockType('ourplugin/are-you-paying-attention', {
    title: "Are You Paying Attention?",
    icon: "smiley",
    category: "common",
    attributes: {
        skyColor: {type: "String"},
        grassColor: {type: "string"}
    },
    edit: function(props){
        function updateSkyColor(e){
            props.setAttributes({skyColor: e.target.value})

        }
        function updateGrassColor(e){
            props.setAttributes({grassColor: e.target.value})
        }
        return (
        <div>
            <input type="text" placeholder="Sky color" onChange={updateSkyColor} />
            <input type="text" placeholder="grass color" onChange={updateGrassColor} />

        </div>
            )
    },
    save: function (props){
        return null;
    }
});



