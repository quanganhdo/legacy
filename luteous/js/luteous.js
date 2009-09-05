editAreaLoader.init({
	id: 'editor',
	syntax: 'css',
	start_highlight: true,
	allow_toggle: false,
	toolbar: 'search, go_to_line, |, undo, redo, |, highlight',
	EA_init_callback: 'Luteous.toggleLoader'
});

var tree = [];
var currentSelector = '';
		
var Luteous = {
	copy: function() {
		var flashcopier = 'flashcopier';
		if (!document.getElementById(flashcopier)) {
	    	var divholder = document.createElement('div');
	    	divholder.id = flashcopier;
	    	document.body.appendChild(divholder);
	  	}
	  	document.getElementById(flashcopier).innerHTML = '';
	    var xxx = editAreaLoader.getValue('editor');
	  	var divinfo = '<embed src="http://quanganhdo.com/luteous/js/_clipboard.swf" FlashVars="clipboard='+encodeURIComponent(xxx)+'" width="0" height="0" type="application/x-shockwave-flash"></embed>';
	  	document.getElementById(flashcopier).innerHTML = divinfo;
		Luteous.alert('<p>Copied.</p>');
	},
	toggleLoader: function() {		
		$('#loading').css({
			top: $(window).height() / 3 + 'px', 
			left: $(window).width() / 2 - 150 + 'px', 
			width: 300 + 'px'
		}).toggle();
		$('#loadingBG').toggle();
	},
	getSelectorTree: function(str) {
		var selectors = str.split(' ');
		var retval = [];
		var queue = '';
		for (var i=0; i < selectors.length - 1; i++) {
			queue += selectors[i] + ' ';
			retval.push(queue);
		};
		return retval;
	},
	highlightSelector: function(selector) {
		$(selector, $('#profile')[0].contentWindow.document).highlightFade({color: 'red', speed:1000, iterator:'exponential'});
	},
	getSelector: function(e){
		var target = Luteous._findTarget(e);
		var queue = className = '';
		while (1) { 
			if (target.id) { // nếu có id thì lấy luôn 
				queue = '#' + target.id + ' ' + queue;
			} else { 
				if (target.className) { // còn nếu có class (1 hoặc hơn) thì chỉ lấy cái đầu tiên 
					className = target.className.indexOf(' ') != -1 ? target.className.substring(0, target.className.indexOf(' ')) : target.className;
					className = '.' + className;
				} else { // không class thì bỏ qua 
					className = '';
				}				
				queue = target.nodeName.toLowerCase() + className + ' ' + queue;
			}
			target = target.parentNode; // lên level cao hơn 
			if (!target || target.id == "bd") return queue; // đụng trần hoặc qua rào thì lượn 
		}
	},
	confirmSelector: function(selector){	
		tree = Luteous.getSelectorTree(selector);
		currentSelector = selector;
		var out = '';		
		var breadcrumbs = selector.split(' ');
		for (var i=0; i < breadcrumbs.length - 1; i++) {
			out += '<a class="breadcrumb" id="bc' + i + '" href="javascript:Luteous.updateSelector(' + i + ')">' + breadcrumbs[i] + '</a>';
			if (i < breadcrumbs.length - 2) out += ' > ';			
		};
		$('#confirm').html('Selector bạn chọn: <span id="selector">' + out + '</span> &bull; <a href="javascript:Luteous.addSelector(currentSelector)">Thêm vào editor &raquo;</a>');
		$('#bc' + parseInt(breadcrumbs.length - 2, 10)).css('color', '#AAAAAA');
	},
	updateSelector: function(i) {
		currentSelector = tree[i];
		$('.breadcrumb').css('color', 'orange');
		$('#bc' + i).css('color', '#AAAAAA');
		Luteous.highlightSelector(tree[i]);
	},
	addSelector: function(selector) {
		Luteous._sendToEditor(selector + '{' + '\n\n' + '}');
		$('#confirm').html('Hãy bấm chọn khu vực bạn muốn sửa trong màn hình bên phải.');
		currentSelector = '';
	},
	applyCSS: function(css) {
		$('style', $('#profile')[0].contentWindow.document).remove();
		$('head', $('#profile')[0].contentWindow.document).append('<style type="text/css">' + css + '</style>');
	},
	about: function(){
		var out = '<p>Luteous alpha - coded by <a href="http://quanganhdo.com">QAD</a></p>';
		out += '<p>Powered by <a href="http://jquery.com">jQuery</a> & <a href="http://www.cdolivet.net/index.php?page=editArea">EditArea</a>. Made with <a href="http://macromates.com">TextMate</a>. On a <a href="http://apple.com/macbook">Mac</a>.</p>';		
		Luteous.alert(out);
	},
	alert: function(out) {
		out += '<small>Press any key to close.</small>';
		$('#loading').html(out);		
		Luteous.toggleLoader();		
		$(window).keypress(function(e) {
			Luteous.toggleLoader();
			$(window).unbind('keypress');			
		});
	},
	_sendToEditor: function(txt) {
		var lf = arguments[1] || '\n';
		editAreaLoader.setValue('editor', editAreaLoader.getValue('editor') + lf + txt);
	},
	_findTarget: function(e){
		var tg = e.target || e.srcElement;
		while (tg.nodeName == '#text') tg = tg.parentNode;
		return tg;
	}
};

var Frame = {
	initialize: function() {
		$('#profile').height($(window).height()).width($(window).width() - $('#sidebar').width());	
		$('#editor').height($(window).height() - 150);
	},
	autoResize: function() {
		$('#profile').height($(window).height()).width($(window).width() - $('#sidebar').width());	
		editAreaLoader.toggle_off('editor');
		$('#editor').height($(window).height() - 150);
		editAreaLoader.toggle_on('editor');
	},
	interceptClicks: function() {
		$('*', $('#profile')[0].contentWindow.document).click(function(e) {
			e.stopPropagation();
			e.preventDefault();
			var selector = Luteous.getSelector(e);			
			Luteous.highlightSelector(selector);
			Luteous.confirmSelector(selector);
		});
	}
};

$(document).ready(function() {
	Luteous.toggleLoader();
	Frame.initialize();
});

$.frameReady(function() {
	Frame.interceptClicks();	
}, 'top.profile');

var resizeTimer = null;
$(window).bind('resize', function() {
   if (resizeTimer) clearTimeout(resizeTimer);
   resizeTimer = setTimeout(Frame.autoResize, 100);
});