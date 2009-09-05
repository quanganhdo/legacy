<html>
<head>
<meta http-equiv="content-type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/colorpicker.css" />
<script type="text/javascript" src="js/colorpicker.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/frame.js"></script>
<script type="text/javascript" src="js/editor.js"></script>
<title>mash layout editor &lt;beta&gt;</title>
<script src="/mint/?js" type="text/javascript"></script>
</head>
<body>
<div id="header"> <a id="brand"></a>
    <div id="editor">
        <!-- step 1 -->
        <div class="step1">
            <label class="title">Phần muốn sửa</label>
            <ul class="styleBox" style="width: 95px; overflow-y: auto; overflow-x: hidden; height: 142px;">
                <li id="background" style="width: 90px;" class="selected"><img src="img/background.png"/>Nền</li>
                <li id="modules" style="width: 90px;" class="unselected"><img src="img/modules.png"/>Module</li>
                <li id="text" style="width: 90px;" class="unselected"><img src="img/text.png"/>Chữ</li>
                <li id="links" style="width: 90px;" class="unselected"><img src="img/links.png"/>Link</li>
                <li id="images" style="width: 90px;" class="unselected"><img src="img/images.png"/>Ảnh</li>
            </ul>
        </div>
        <!-- step 2 -->
        <div id="output">
            <div class="step2" style="display:none">
                <label class="title">Mã CSS</label>
                <div class="options">
                    <textarea id="cssOutput" readonly="true" cols="50" rows="6"></textarea>
                </div>
            </div>
            <div class="tips" style="display:none">
                <div style="padding-top:5px;margin-left: 22px; width: 162px; height: 106px;">
                    <p class="text"> <span style="line-height: 14px;">Bạn hãy copy và dán đoạn mã này vào mục <strong>Advanced CSS</strong> trong Mash profile của bạn. Profile dưới đây chỉ là ví dụ!</span></p>
                </div>
            </div>
        </div>
        <div id="playground">
            <div class="step2" style="display:none">
                <label class="title">Mã CSS</label>
                <div class="options">
                    <textarea id="cssDIY" cols="50" rows="5"></textarea><br />
                    <span id="diyImport" class="Refresh">Sử dụng mã CSS đang có &raquo;</span>&nbsp;&nbsp;<span id="diyApply" class="refresh">Apply &raquo;</span>
                </div>
            </div>
            <div class="tips" style="display:none">
                <div style="padding-top:5px;margin-left: 22px; width: 162px; height: 106px;">
                    <p class="text"> <span style="line-height: 14px;">Bạn có thể tùy ý chỉnh sửa CSS trong khung này. Bấm <strong>Apply &raquo;</strong> để xem kết quả.</span></p>
                </div>
            </div>
        </div>
        <div id="stealCSS">
            <div class="step2" style="display:none">
                <label class="title">Lấy CSS từ theme blog Yahoo! 360</label>
                <div class="options">
                    Địa chỉ blog Yahoo! 360: <input type="text" id="360URL" value="http://" />&nbsp;&nbsp;<span id="steal" class="refresh">Lấy CSS &raquo;</span>&nbsp;&nbsp;
                    <span id="load" style="display:none"><img src="img/loading.gif" style="vertical-align:middle;" /></span><br /><br />
                    <textarea id="stolenCSS" cols="50" rows="4" readonly="true"></textarea><br />
                </div>
            </div>
            <div class="tips" style="display:none">
                <div style="padding-top:5px;margin-left: 22px; width: 162px; height: 106px;">
                    <p class="text"> <span style="line-height: 14px;">Tính năng này hiện đang thử nghiệm. Nếu có vấn đề gì bạn hãy góp ý cho tớ.</span></p>
                </div>
            </div>
        </div>
        <div id="contactMe">
            <div class="step2" style="display:none">
                <label class="title">Thông tin/Thắc mắc/Góp ý</label>
                <div class="options">
                    Giao diện <strong>mash layout editor</strong> được dựa trên giao diện Real Editor.<br />
                    Code bằng HTML và JavaScript, sử dụng thư viện jQuery và một số plugin khác.<br />
                    <br />
                    Nếu có thắc mắc/góp ý gì, bạn có thể liên hệ với tớ qua YM: <strong>id3ntical</strong><br />
                    Hoặc, bạn có thể để lại comment trong bài viết <a href="http://quanganhdo.com/yahoo-mash-layout-editor" style="color:white">Yahoo! Mash layout editor</a> trên blog của tớ.
                </div>
            </div>
        </div>
        <div id="backgroundOptions">
            <div class="step2">
                <label class="title">Ảnh nền</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bgEnable" onchange="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});">
                                Sử dụng ảnh nền&nbsp;&nbsp; <span id="bgRefresh" onclick="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});" class="refresh">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>URL tới ảnh:</td>
                            <td><input type="text" id="bgURL" value="http://" onchange="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});"></td>
                        </tr>
                        <tr>
                            <td>Vị trí:</td>
                            <td><select id="bgPosition" onchange="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});">
                                    <option value="top left">trái trên</option>
                                    <option value="top center">giữa trên</option>
                                    <option value="top right">phải trên</option>
                                    <option value="center left">trái giữa</option>
                                    <option value="center center">chính giữa</option>
                                    <option value="center right">phải giữa</option>
                                    <option value="bottom left">trái dưới</option>
                                    <option value="bottom center">giữa dưới</option>
                                    <option value="bottom right">phải dưới</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Lặp ảnh:</td>
                            <td><select id="bgRepeat" onchange="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});">
                                    <option value="">theo cả 2 chiều</option>
                                    <option value="repeat-x">theo chiều ngang</option>
                                    <option value="repeat-y">theo chiều dọc</option>
                                    <option value="no-repeat">không lặp</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bgFixed" onchange="changeBgImage({target:{real:'#bd', code:'body'}, enable:$('#bgEnable')[0].checked, fixed:$('#bgFixed')[0].checked, url:$('#bgURL')[0].value, position:$('#bgPosition')[0].value, repeat:$('#bgRepeat')[0].value});">
                                Giữ nguyên ảnh khi cuộn trang</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="step2">
                <label class="title">Màu nền + Banner</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bgcEnable" onchange="changeBgColor({target:{real:'#bd', code:'body'}, enable:$('#bgcEnable')[0].checked, color:$('#bgcHex')[0].value});">
                                Sử dụng màu nền&nbsp;&nbsp; <span id="bgcRefresh" class="refresh" onclick="changeBgColor({target:{real:'#bd', code:'body'}, enable:$('#bgcEnable')[0].checked, color:$('#bgcHex')[0].value});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>Mã màu:</td>
                            <td><input type="text" id="bgcHex" value="" onchange="this.style.backgroundColor = this.value;changeBgColor({target:{real:'#bd', code:'body'}, enable:$('#bgcEnable')[0].checked, color:$('#bgcHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#bgcHex')[0], forceChangeBgColor)"></td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bannerEnable" onchange="changeBanner();">
                                Đặt banner phía trên profile&nbsp;&nbsp; <span id="bannerRefresh" class="refresh" onclick="changeBanner();">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>URL tới banner:</td>
                            <td><input type="text" id="bannerURL" value="http://" onchange="changeBanner();"></td>
                        </tr>
                        <tr>
                            <td>Chiều cao banner:</td>
                            <td><input type="text" id="bannerSize" value="100" onchange="changeBanner();"></td>
                            <td><img class="help fixPNG" onclick="alert('Chiều cao banner là khoảng cách tính từ đầu profile đến module user card')" src="img/help.png" /></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="tips">
                <div style="padding-top:5px;margin-left: 22px; width: 162px; height: 106px;">
                    <p class="text"> <span style="line-height: 14px;">Nếu mục preview hiển thị không đúng, bạn hãy bấm link <strong>Refresh &raquo;</strong> tại mục tương ứng. Nhớ là bạn không thể vừa chỉnh ảnh nền vừa đặt banner trong profile. </span></p>
                </div>
            </div>
        </div>
        <div id="modulesOptions">
            <div class="step2" style="display:none">
                <label class="title">Nền</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bgModuleEnable" onchange="changeBgImage({target:{real:'#bd .mod', code:'.mod'}, enable:$('#bgModuleEnable')[0].checked, url:$('#bgModuleURL')[0].value, repeat:$('#bgModuleRepeat')[0].value});">
                                Sử dụng ảnh nền&nbsp;&nbsp; <span id="bgModuleRefresh" class="refresh" onclick="changeBgImage({target:{real:'#bd .mod', code:'.mod'}, enable:$('#bgModuleEnable')[0].checked, url:$('#bgModuleURL')[0].value, repeat:$('#bgModuleRepeat')[0].value});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>URL tới ảnh:</td>
                            <td><input type="text" id="bgModuleURL" value="http://" onchange="changeBgImage({target:{real:'#bd .mod', code:'.mod'}, enable:$('#bgModuleEnable')[0].checked, url:$('#bgModuleURL')[0].value, repeat:$('#bgModuleRepeat')[0].value});"></td>
                        </tr>
                        <tr>
                            <td>Lặp ảnh:</td>
                            <td><select id="bgModuleRepeat" onchange="changeBgImage({target:{real:'#bd .mod', code:'.mod'}, enable:$('#bgModuleEnable')[0].checked, url:$('#bgModuleURL')[0].value, repeat:$('#bgModuleRepeat')[0].value});">
                                    <option value="">theo cả 2 chiều</option>
                                    <option value="repeat-x">theo chiều ngang</option>
                                    <option value="repeat-y">theo chiều dọc</option>
                                    <option value="no-repeat">không lặp</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="bgModuleColorEnable" onchange="changeBgColor({target:{real:'#bd .mod', code:'body'}, enable:$('#bgModuleColorEnable')[0].checked, color:$('#bgModuleColorHex')[0].value});">
                                Sử dụng màu nền&nbsp;&nbsp; <span id="bgModuleColorRefresh" class="refresh" onclick="changeBgColor({target:{real:'#bd .mod', code:'body'}, enable:$('#bgModuleColorEnable')[0].checked, color:$('#bgModuleColorHex')[0].value});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>Mã màu:</td>
                            <td><input type="text" id="bgModuleColorHex" value="" onchange="this.style.backgroundColor = this.value;changeBgColor({target:{real:'#bd .mod', code:'body'}, enable:$('#bgModuleColorEnable')[0].checked, color:$('#bgModuleColorHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#bgModuleColorHex')[0], forceChangeModuleColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="step2" style="display:none">
                <label class="title">Độ trong suốt + Viền module</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td>Độ trong suốt (0-100):</td>
                            <td><input type="text" id="moduleTrans" value="0" onchange="changeModuleTransparency({opacity:$('#moduleTrans')[0].value, target:{real:'#bd .mod', code:'.mod'}});"></td>
                            <td><span id="moduleTransRefresh" class="refresh" onclick="changeModuleTransparency({opacity:$('#moduleTrans')[0].value, target:{real:'#bd .mod', code:'.mod'}});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="moduleBorderEnable" onchange="changeBorder({target:{real:'#bd .mod', code:'.mod'}, enable:$('#moduleBorderEnable')[0].checked, style:$($('#moduleBorderStyle')[0], 'option.selected')[0].value, size:$($('#moduleBorderSize')[0], 'option.selected')[0].value, color:$('#moduleBorderHex')[0].value});">
                                Sử dụng đường viền&nbsp;&nbsp; <span id="moduleBorderRefresh" class="refresh" onclick="changeBorder({target:{real:'#bd .mod', code:'.mod'}, enable:$('#moduleBorderEnable')[0].checked, style:$($('#moduleBorderStyle')[0], 'option.selected')[0].value, size:$($('#moduleBorderSize')[0], 'option.selected')[0].value, color:$('#moduleBorderHex')[0].value});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>Kiểu đường viền:</td>
                            <td>
                                <select id="moduleBorderStyle" onchange="changeBorder({target:{real:'#bd .mod', code:'.mod'}, enable:$('#moduleBorderEnable')[0].checked, style:$($('#moduleBorderStyle')[0], 'option.selected')[0].value, size:$($('#moduleBorderSize')[0], 'option.selected')[0].value, color:$('#moduleBorderHex')[0].value});">
                                    <option value="solid">solid</option>
                                    <option value="double">double</option>
                                    <option value="dotted">dotted</option>
                                    <option value="dashed">dashed</option>
                                    <option value="grove">grove</option>
                                    <option value="ridge">ridge</option>
                                    <option value="inset">inset</option>
                                    <option value="outset">outset</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Độ dày đường viền:</td>
                            <td>
                                <select id="moduleBorderSize" onchange="changeBorder({target:{real:'#bd .mod', code:'.mod'}, enable:$('#moduleBorderEnable')[0].checked, style:$($('#moduleBorderStyle')[0], 'option.selected')[0].value, size:$($('#moduleBorderSize')[0], 'option.selected')[0].value, color:$('#moduleBorderHex')[0].value});">
                                    <option value="1px">1 px</option>
                                    <option value="2px">2 px</option>
                                    <option value="3px">3 px</option>
                                    <option value="5px">5 px</option>
                                    <option value="10px">10 px</option>
                                    <option value="20px">20 px</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Màu đường viền:</td>
                            <td><input type="text" id="moduleBorderHex" value="" onchange="this.style.backgroundColor = this.value;changeBorder({target:{real:'#bd .mod', code:'.mod'}, enable:$('#moduleBorderEnable')[0].checked, style:$($('#moduleBorderStyle')[0], 'option.selected')[0].value, size:$($('#moduleBorderSize')[0], 'option.selected')[0].value, color:$('#moduleBorderHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#moduleBorderHex')[0], forceChangeModuleBorderColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="step2" style="display:none">
                <label class="title">Ẩn/Hiện module</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td colspan="2"><input type="checkbox" id="hideStyle" onchange="hideModule({enable:$('#hideStyle')[0].checked, target:{real:'#bd #ypf-style', code:'#ypf-style'}});">
                                Ẩn module Style this profile</td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="hideCoolStuff" onchange="hideModule({enable:$('#hideCoolStuff')[0].checked, target:{real:'#bd #ypf-add-mod', code:'#ypf-add-mod'}});">
                                Ẩn module Add cool stuff</td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="textOptions">
            <div class="step2" style="display:none">
                <label class="title">Font + Màu + Cỡ chữ</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td><span id="textRefresh" class="refresh" onclick="changeText({target:{real:'#bd', code:'body'}, font:$($('#textFont')[0], 'option.selected')[0].value, size:$('#textSize')[0].value, color:$('#textHex')[0].value});">Refresh &raquo;</span></td>
                        </tr>
                        <tr>
                            <td>Font chữ:</td>
                            <td>
                                <select id="textFont" onchange="changeText({target:{real:'#bd', code:'body'}, font:$($('#textFont')[0], 'option.selected')[0].value, size:$('#textSize')[0].value, color:$('#textHex')[0].value});">
                                    <option value="Helvetica">Helvetica</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Comic Sans MS">Comic Sans MS</option>
                                    <option value="Courier">Courier</option>
                                    <option value="Impact">Impact</option>
                                    <option value="Verdana">Verdana</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cỡ chữ (px):</td>
                            <td><input type="text" id="textSize" value="12" onchange="changeText({target:{real:'#bd', code:'body'}, font:$($('#textFont')[0], 'option.selected')[0].value, size:$('#textSize')[0].value, color:$('#textHex')[0].value});" /></td>
                        </tr>
                        <tr>
                            <td>Màu chữ:</td>
                            <td><input type="text" id="textHex" value="" onchange="this.style.backgroundColor = this.value;changeText({target:{real:'#bd', code:'body'}, font:$($('#textFont')[0], 'option.selected')[0].value, size:$('#textSize')[0].value, color:$('#textHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#textHex')[0], forceChangeTextColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="step2" style="display:none">
                <label class="title">Font + Màu + Cỡ tiêu đề module</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td><span id="titleRefresh" class="refresh" onclick="changeText({target:{real:'#bd h3', code:'h3'}, font:$($('#titleFont')[0], 'option.selected')[0].value, size:$('#titleSize')[0].value, color:$('#titleHex')[0].value});">Refresh &raquo;</span></td>
                        </tr>
                        <tr>
                            <td>Font tiêu đề:</td>
                            <td>
                                <select id="titleFont" onchange="changeText({target:{real:'#bd h3', code:'h3'}, font:$($('#titleFont')[0], 'option.selected')[0].value, size:$('#titleSize')[0].value, color:$('#titleHex')[0].value});">
                                    <option value="Helvetica">Helvetica</option>
                                    <option value="Arial">Arial</option>
                                    <option value="Comic Sans MS">Comic Sans MS</option>
                                    <option value="Courier">Courier</option>
                                    <option value="Impact">Impact</option>
                                    <option value="Verdana">Verdana</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Cỡ tiêu đề (px):</td>
                            <td><input type="text" id="titleSize" value="14" onchange="changeText({target:{real:'#bd h3', code:'h3'}, font:$($('#titleFont')[0], 'option.selected')[0].value, size:$('#titleSize')[0].value, color:$('#titleHex')[0].value});" /></td>
                        </tr>
                        <tr>
                            <td>Màu tiêu đề:</td>
                            <td><input type="text" id="titleHex" value="" onchange="this.style.backgroundColor = this.value;changeText({target:{real:'#bd h3', code:'h3'}, font:$($('#titleFont')[0], 'option.selected')[0].value, size:$('#titleSize')[0].value, color:$('#titleHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#titleHex')[0], forceChangeTitleColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="linksOptions">
            <div class="step2" style="display:none">
                <label class="title">Link</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td><span id="linkRefresh" class="refresh" onclick="forceChangeLinkColor();forceChangeHoverColor();forceChangeVisitColor();">Refresh &raquo;</span></td>
                        </tr>
                        <tr>
                            <td>Màu link thường:</td>
                            <td><input type="text" id="linkHex" value="" onchange="this.style.backgroundColor = this.value;forceChangeLinkColor();"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#linkHex')[0], forceChangeLinkColor)"></td>
                        </tr>
                        <tr>
                            <td>Màu link khi di chuột qua:</td>
                            <td><input type="text" id="hoverHex" value="" onchange="this.style.backgroundColor = this.value;forceChangeHoverColor();"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#hoverHex')[0], forceChangeHoverColor)"></td>
                        </tr>
                        <tr>
                            <td>Màu link đã bấm:</td>
                            <td><input type="text" id="visitHex" value="" onchange="this.style.backgroundColor = this.value;forceChangeVisitColor();"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#visitHex')[0], forceChangeVisitColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
        <div id="imagesOptions">
            <div class="step2" style="display:none">
                <label class="title">Độ trong suốt + Viền ảnh</label>
                <div class="options">
                    <table border="0">
                        <tr>
                            <td>Độ trong suốt (0-100):</td>
                            <td><input type="text" id="imageTrans" value="0" onchange="changeModuleTransparency({opacity:$('#imageTrans')[0].value, target:{real:'#bd img', code:'img'}});"></td>
                            <td><span id="imageTransRefresh" class="refresh" onclick="changeModuleTransparency({opacity:$('#imageTrans')[0].value, target:{real:'#bd img', code:'img'}});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td colspan="2"><input type="checkbox" id="imageBorderEnable" onchange="changeBorder({target:{real:'#bd img', code:'img'}, enable:$('#imageBorderEnable')[0].checked, style:$($('#imageBorderStyle')[0], 'option.selected')[0].value, size:$($('#imageBorderSize')[0], 'option.selected')[0].value, color:$('#imageBorderHex')[0].value});">
                                Sử dụng đường viền&nbsp;&nbsp; <span id="imageBorderRefresh" class="refresh" onclick="changeBorder({target:{real:'#bd img', code:'img'}, enable:$('#imageBorderEnable')[0].checked, style:$($('#imageBorderStyle')[0], 'option.selected')[0].value, size:$($('#imageBorderSize')[0], 'option.selected')[0].value, color:$('#imageBorderHex')[0].value});">Refresh &raquo;</span> </td>
                        </tr>
                        <tr>
                            <td>Kiểu đường viền:</td>
                            <td>
                                <select id="imageBorderStyle" onchange="changeBorder({target:{real:'#bd img', code:'img'}, enable:$('#imageBorderEnable')[0].checked, style:$($('#imageBorderStyle')[0], 'option.selected')[0].value, size:$($('#imageBorderSize')[0], 'option.selected')[0].value, color:$('#imageBorderHex')[0].value});">
                                    <option value="solid">solid</option>
                                    <option value="double">double</option>
                                    <option value="dotted">dotted</option>
                                    <option value="dashed">dashed</option>
                                    <option value="grove">grove</option>
                                    <option value="ridge">ridge</option>
                                    <option value="inset">inset</option>
                                    <option value="outset">outset</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Độ dày đường viền:</td>
                            <td>
                                <select id="imageBorderSize" onchange="changeBorder({target:{real:'#bd img', code:'img'}, enable:$('#imageBorderEnable')[0].checked, style:$($('#imageBorderStyle')[0], 'option.selected')[0].value, size:$($('#imageBorderSize')[0], 'option.selected')[0].value, color:$('#imageBorderHex')[0].value});">
                                    <option value="1px">1 px</option>
                                    <option value="2px">2 px</option>
                                    <option value="3px">3 px</option>
                                    <option value="5px">5 px</option>
                                    <option value="10px">10 px</option>
                                    <option value="20px">20 px</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>Màu đường viền:</td>
                            <td><input type="text" id="imageBorderHex" value="" onchange="this.style.backgroundColor = this.value;changeBorder({target:{real:'#bd img', code:'img'}, enable:$('#imageBorderEnable')[0].checked, style:$($('#imageBorderStyle')[0], 'option.selected')[0].value, size:$($('#imageBorderSize')[0], 'option.selected')[0].value, color:$('#imageBorderHex')[0].value});"></td>
                            <td><img src="img/picker.png" class="picker" onclick="showColorPicker(this, $('#imageBorderHex')[0], forceChangeImageBorderColor)"></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<img id="shadow" src="img/shadow.png" />
<div id="buttons">
    <span id="generate" style="background-color:#F28700;">Sinh mã CSS</span>
    <span id="diy">Tự sửa CSS</span>
    <span id="get" style="background-color:#F28700;">Lấy CSS từ Y!360</span>
    <span id="contact">Góp ý</span>
</div>
<div id="credit"> <span id="about"></span> </div>
<iframe id="mash" src="chanh.html" name="mash" frameborder="no"> </iframe>
<!--<script src="http://www.google-analytics.com/urchin.js" type="text/javascript">
</script>
<script type="text/javascript">
_uacct = "UA-145409-3";
urchinTracker();
</script>-->
</body>
</html>
