    function resizeFrame() {
		wh = window.innerHeight ? window.innerHeight : document.body.clientHeight;
		$('#mash')[0].height = wh - $('#header')[0].scrollHeight - 5;
	}

	function interceptClicks() {
		mash = $('#mash')[0].contentWindow.document;
		$('a', mash).click(function(e){
			e.stopPropagation();
			e.preventDefault();
		});
	}

	function prepareEditor() {
		// initialize
		customCSS = new Object;
		customCSS['body'] = new Object;
		customCSS['.mod'] = new Object;
		customCSS['#ypf-style'] = new Object;
		customCSS['#ypf-add-mod'] = new Object;
		customCSS['h3'] = new Object;
		customCSS['a'] = new Object;
		customCSS['a:hover'] = new Object;
		customCSS['a:visited'] = new Object;
		customCSS['img'] = new Object;
		// buttons
		$('#generate').click(function() {
			var output = '';
			for (i in customCSS) {
				output += i + ' {\n';
				for (j in customCSS[i]) {
					if (customCSS[i][j] != '' && typeof(customCSS[i][j]) != 'undefined') {
						output += '\t' + j + ':' + customCSS[i][j] + ';\n';
					}
				}
				output += '}\n';
			}
            $('.step2, .tips').hide();
            $('.step1 .styleBox li').removeClass('selected').addClass('unselected');
            $('#output .step2, #output .tips').fadeIn();
            $('#cssOutput')[0].value = output;
            $('#cssOutput').click(function() {
                $('#cssOutput')[0].select();
            });
		});
        $('#diy').click(function() {
            $('.step2, .tips').hide();
            $('.step1 .styleBox li').removeClass('selected').addClass('unselected');
            $('#playground .step2, #playground .tips').fadeIn();
        });
        $('#contact').click(function() {
        $('.step2, .tips').hide();
            $('.step1 .styleBox li').removeClass('selected').addClass('unselected');
            $('#contactMe .step2').fadeIn();
        });
        $('#diyImport').click(function() {
            var output = '';
			for (i in customCSS) {
				output += i + ' {\n';
				for (j in customCSS[i]) {
					if (customCSS[i][j] != '') {
						output += '\t' + j + ':' + customCSS[i][j] + ';\n';
					}
				}
				output += '}\n';
			}
            $('#cssDIY')[0].value = output;
        });
        $('#diyRefresh').click(function() {
            t = new Object();
            u = $('#cssDIY')[0].value;
            c = $('#cssDIY')[0].value.match(/(.*?){/g);
            for (i = 0; i < c.length; i++) {
                s = c[i].split(',');
                for (j = 0; j < s.length; j++) {
                    if (typeof(t[s[j]])=='undefined') {
                        r = new RegExp(s[j], 'g');
                        u = u.replace(r, '#bd ' + s[j].replace(/body/g, ''));
                        t[s[j]] = 'uki';
                    }
                }
            }
            $('style').remove();
            $('head', $('#mash')[0].contentWindow.document).append('<style type="text/css">' + u + '</style>');
        });
		// step 1
		$('.step1 .styleBox li').click(function() {
			$('.step1 .styleBox li').removeClass('selected').addClass('unselected');
    		$(this).addClass('selected');
            $('.step2, .tips').hide();
            $('#' + this.id + 'Options .step2, #' + this.id + 'Options .tips').fadeIn();
		});
    }

    function forceChangeImageBorderColor() {
        $('#imageBorderEnable')[0].checked = true;
        var code = $('#imageBorderHex')[0].value;
        code = code.replace(/undefined/ig, '');
		$('#bd img', $('#mash')[0].contentWindow.document).css('border-color', code);
		customCSS['img']['border-color'] = code;
    }

    function forceChangeLinkColor() {
        $('#bd a', $('#mash')[0].contentWindow.document).css('color', $('#linkHex')[0].value);
        customCSS['a']['color'] = $('#linkHex')[0].value;
    }

    function forceChangeHoverColor() {
        $('#bd a:hover', $('#mash')[0].contentWindow.document).css('color', $('#hoverHex')[0].value);
        customCSS['a:hover']['color'] = $('#hoverHex')[0].value;
    }

    function forceChangeVisitColor() {
        $('#bd a:visited', $('#mash')[0].contentWindow.document).css('color', $('#visitHex')[0].value);
        customCSS['a:visited']['color'] = $('#visitHex')[0].value;
    }

    function forceChangeTitleColor() {
        $('#bd h3', $('#mash')[0].contentWindow.document).css('color', $('#titleHex')[0].value);
        customCSS['h3']['color'] = $('#titleHex')[0].value;
    }

    function forceChangeTextColor() {
        $('#bd', $('#mash')[0].contentWindow.document).css('color', $('#textHex')[0].value);
        customCSS['body']['color'] = $('#textHex')[0].value;
    }

    // available params: font, size, color, target(real, code)
    function changeText(obj) {
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('color', obj.color);
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('font-size', obj.size + 'px');
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('font-family', obj.font);
        customCSS[obj.target.code]['color'] = obj.color;
        customCSS[obj.target.code]['font-size'] = obj.size + 'px';
        customCSS[obj.target.code]['font-family'] = obj.font;
    }

    // available params: enable, target(real, code)
    function hideModule(obj) {
        var d = 'block';
        if (obj.enable) {
            d = 'none';
        }
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('display', d);
        customCSS[obj.target.code]['display'] = d;
    }

    // available params: opacity, target(real, code)
    function changeModuleTransparency(obj) {
        var o = 100 - obj.opacity;
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('filter', 'alpha(opacity=' + o + ')');
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('-moz-opacity', o / 100);
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('opacity', o / 100);
        customCSS[obj.target.code]['filter'] = 'alpha(opacity=' + o + ')';
        customCSS[obj.target.code]['-moz-opacity'] = o / 100;
        customCSS[obj.target.code]['opacity'] = o / 100;
    }

    function changeBanner() {
        var code1 = code2 = '';
		if ($('#bannerEnable')[0].checked) {
			code1 = 'url(' + $('#bannerURL')[0].value + ') top no-repeat';
			code2 =  $('#bannerSize')[0].value + 'px';
		}
        code1 = code1.replace(/undefined/ig, '');
        code2 = code2.replace(/undefined/ig, '');
		$('#bd', $('#mash')[0].contentWindow.document).css('background', code1).css('padding-top', code2);
		customCSS['body']['background'] = code1;
		customCSS['body']['padding-top'] = code2;
    }

    // available params: target(real, code), fixed, enable, url, position, repeat
    function changeBgImage(obj) {
		var code = '';
		if (obj.enable) {
			fix3d = obj.fixed ? 'fixed' : '';
            c = customCSS[obj.target.code]['background-color'] ? customCSS[obj.target.code]['background-color'] : '';
			code =  c + ' url(' + obj.url + ') ' + obj.position + ' ' + obj.repeat + ' ' + fix3d;
		}
        code = code.replace(/undefined/ig, '');
		$(obj.target.real, $('#mash')[0].contentWindow.document).css('background', code);
		customCSS[obj.target.code]['background'] = code;
    }

    function forceChangeModuleBorderColor() {
        $('#moduleBorderEnable')[0].checked = true;
        var code = $('#moduleBorderHex')[0].value;
        code = code.replace(/undefined/ig, '');
		$('#bd .mod', $('#mash')[0].contentWindow.document).css('border-color', code);
		customCSS['.mod']['border-color'] = code;
    }

    function forceChangeBgColor() {
        $('#bgcEnable')[0].checked = true;
        var code = $('#bgcHex')[0].value;
        code = code.replace(/undefined/ig, '');
		$('#bd', $('#mash')[0].contentWindow.document).css('background-color', code);
		customCSS['body']['background-color'] = code;
    }

    function forceChangeModuleColor() {
        $('#bgModuleColorEnable')[0].checked = true;
        var code = $('#bgModuleColorHex')[0].value;
        code = code.replace(/undefined/ig, '');
		$('#bd .mod', $('#mash')[0].contentWindow.document).css('background-color', code);
		customCSS['.mod']['background-color'] = code;
    }

    // available params: target(real, code), color, enable, size, style
    function changeBorder(obj) {
        var code = '#ffffff';
        if (obj.enable) {
			code = obj.size + ' #' + obj.color + ' ' + obj.style;
		}
        code = code.replace(/undefined/ig, '');
        $(obj.target.real, $('#mash')[0].contentWindow.document).css('border', code);
		customCSS[obj.target.code]['border'] = code;
		customCSS[obj.target.code]['border-color'] = '';
    }

    // available params: target(real, code), color, enable
    function changeBgColor(obj) {
        var code = '#ffffff';
		if (obj.enable) {
			code = obj.color;
		}
        code = code.replace(/undefined/ig, '');
		$(obj.target.real, $('#mash')[0].contentWindow.document).css('background-color', code);
		customCSS[obj.target.code]['background-color'] = code;
    }

	$(document).ready(function() {
		resizeFrame();
		prepareEditor();
        $('#about')[0].innerHTML = 'Version 0.3 BETA &bull; Coded by QAD &bull; Inspired by Real Editor';
	});

	$.frameReady(function() {
		interceptClicks();
	}, 'top.mash');

	window.onresize = resizeFrame;