tinymce.PluginManager.add('soulstyles', function(editor) {
	var soulstyles_blocks = editor.getLang('soulstyles.blocks'); 
	var soulstyles_menu = [];
	jQuery.each( soulstyles_blocks, function(a,b,c){
		var item = this;
		soulstyles_menu[soulstyles_menu.length] = 			{
			text: item.title,
			onclick: function(e) {
			    editor.focus();
			    var tag 	= item.before;
			    var tag_end = item.after;
			    var text = editor.selection.getContent({'format': 'html'});
				editor.execCommand('mceReplaceContent', false, tag+text+tag_end );
			},
		}
	})
	editor.addButton('soulstyles', {
		type: 'menubutton',
		text: 'SoulStyles',
		tooltip: 'Insert SoulStyles block',
		menu: soulstyles_menu,
	});
});
