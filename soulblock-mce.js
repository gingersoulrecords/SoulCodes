tinymce.PluginManager.add('soulstyles', function(editor) {
	editor.addButton('soulstyles', {
		type: 'menubutton',
		text: 'SoulStyles',
		tooltip: 'Insert SoulStyles block',
		menu: [
			{
				text: '[div]',
				onclick: function() {
				    editor.focus();
				    var tag 	= '[div]';
				    var tag_end = '[/div]';
				    var text = editor.selection.getContent({'format': 'html'});
					editor.execCommand('mceReplaceContent', false, tag+text+tag_end );
				},
			},
			{
				text: '[div2]',
				onclick: function() {
				    editor.focus();
				    var tag 	= '[div2]';
				    var tag_end = '[/div2]';
				    var text = editor.selection.getContent({'format': 'html'});
					editor.execCommand('mceReplaceContent', false, tag+text+tag_end );
				},
			},
			{
				text: '[div3]',
				onclick: function() {
				    editor.focus();
				    var tag 	= '[div3]';
				    var tag_end = '[/div3]';
				    var text = editor.selection.getContent({'format': 'html'});
					editor.execCommand('mceReplaceContent', false, tag+text+tag_end );
				},
			},			{
				text: '[div4]',
				onclick: function() {
				    editor.focus();
				    var tag 	= '[div4]';
				    var tag_end = '[/div4]';
				    var text = editor.selection.getContent({'format': 'html'});
					editor.execCommand('mceReplaceContent', false, tag+text+tag_end );
				},
			},
		],
	});
});
