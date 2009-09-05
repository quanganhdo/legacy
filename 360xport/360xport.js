function wxr(s) {
    output += s;
}

function convertTime(s) {
    t = s.match(/([^-]*)- ([0-9][0-9]:[0-9][0-9])/);
    fullTime = new Date(t[1]);
    year = fullTime.getFullYear();
    month = fullTime.getMonth() + 1;
    date = fullTime.getDate();
    return year + '-' + month + '-' + date + ' ' + t[2] + ':00';
}

function handleResponse(obj, code) {
    $('.doc-layout-body')[0].innerHTML = obj.responseText;

    title = $('.post-head').text();

    tags = $.map($.grep($('.post-body .foot a'), function(i) { return i.rel == 'nofollow tag'; }), function(i) { return i.innerHTML; });

    body = (typeof($('.image-wrapper img').attr('src')) != 'undefined') ? '<center><img src="' + $('.image-wrapper img').attr('src') + '" /></center><br /><br />' : '';
    body += $('.content-wrapper').html();
    body = body.replace(/<script type="text\/javascript">yfla.wrap\(.*?(<embed.*?)"\).*?<\/noscript>/g, "$1") .replace(/\\"/g, '"').replace(/\\\//g, '/');

    time = convertTime($('.post-body .foot p').html());
    gmt = convertTime($('.post-body .foot p').html());

    cmtCount = 0;

    if ($('#comments .head h4').length != 0) {
        cmtCount = $('#comments .head em').text().match(/\(([0-9]*)/)[1];
    }

    if (cmtCount <= 50 || $('.pagination.top a[@id="num_prev"]').length != 1) {
        wxr('\
            \n<item>\
            \n<title>' + title + '</title>\
            \n<dc:creator>' + blogger + '</dc:creator>\
        ');

        if (tags[0] != '') {
            $.each(tags, function(i, n) {
                wxr('\n<category domain="tag"><![CDATA[' + n + ']]></category>');
            });
        } else {
            wxr('\n<category><![CDATA[Uncategorized]]></category>');
        }

        wxr('\
            \n<content:encoded><![CDATA[' + $.trim(body) + ']]></content:encoded>\
            \n<wp:post_id>' + count + '</wp:post_id>\
            \n<wp:post_date>' + time + '</wp:post_date>\
            \n<wp:post_date_gmt>' + gmt + '</wp:post_date_gmt>\
            \n<wp:comment_status>open</wp:comment_status>\
            \n<wp:ping_status>open</wp:ping_status>\
            \n<wp:status>publish</wp:status>\
            \n<wp:post_parent>0</wp:post_parent>\
            \n<wp:menu_order>0</wp:menu_order>\
            \n<wp:post_type>post</wp:post_type>\
        ');
    }

    if ($('#comments .head h4').length != 0) {
        cmtAuthor = $.map($('.comments .row .user-name a'), function(i) { return i.title; });
        cmtURL = $.map($('.comments .row .user-name a'), function(i) { return i.href; });
        cmtTime = $.map($('.comments .row .datestamp'), function(i) { return convertTime(i.innerHTML); });
        cmtGMT = $.map($('.comments .row .datestamp'), function(i) { return convertTime(i.innerHTML); });
        cmtContent = $.map($('.comments .row .comment'), function(i) { return i.innerHTML; });
        for (i = 0; i < cmtAuthor.length; i++) {
            wxr('\
                \n<wp:comment>\
                \n<wp:comment_author>' + cmtAuthor[i] + '</wp:comment_author>\
                \n<wp:comment_author_email>webmaster@yahoo.com</wp:comment_author_email>\
                \n<wp:comment_author_url>' + cmtURL[i] + '</wp:comment_author_url>\
                \n<wp:comment_author_IP>127.0.0.1</wp:comment_author_IP>\
                \n<wp:comment_date>' + cmtTime[i] + '</wp:comment_date>\
                \n<wp:comment_date_gmt>' + cmtGMT[i] + '</wp:comment_date_gmt>\
                \n<wp:comment_content>' + cmtContent[i] + '</wp:comment_content>\
                \n<wp:comment_approved>1</wp:comment_approved>\
                \n<wp:comment_type></wp:comment_type>\
                \n<wp:comment_parent>0</wp:comment_parent>\
                \n</wp:comment>\
            ');
        }
    }

    if (cmtCount <= 50 || $('.pagination.top a[@id="num_next"]').length != 1) {
        nextURL = $('a', $('.foot p.nav span')[1]).attr('href');
        wxr('\n</item>');
        count++;
        $('#remain').html(limit - count);
    } else {
        nextURL = $('.pagination.top a[@id="num_next"]').attr('href');
    }

    if (count < limit) {
        getEntry();
    } else {
        wxr('\n</channel>\n</rss>');
        $('#wxr').val(output).show();
        $('#start').hide();
        $('#intro').html('Quá trình export hoàn tất. Bạn hãy copy đoạn text trong khung dưới đây, paste vào notepad, save thành file <strong>blog.xml</strong> với encoding UTF-8 và dùng tính năng import của WordPress để tiến hành nhập dữ liệu.<br /><br />Cảm ơn vì đã sử dụng 360xport!<br /><br />');
    }
}

// configuration
startURL = $('a', $('.post-body .foot')[0])[$('a', $('.post-body .foot')[0]).length - 1].href;
limit = $('#doc-2 .top .limit').text();

// init
bTitle = $('#ymgl-blog .head h3').text().match(/(.*) Full Post View | List View/)[1];
blogger = $('.nickname').text();
bDescription = $('#ymgl-blog .head .footnote').text();
nextURL = startURL;
count = 0;

// hide stuff
$('.doc-layout-body')[0].style.display = 'none';
$('#doc-foot, #ymgl-masthead, #ymgl-feedback').hide();

// append thingy
$('#ygma').html('<h2>360xport version 0.1 - coded by <a href="http://quanganhdo.com/chuyen-noi-dung-blog-y360-sang-wp-voi-360xport/" style="color:white;">QAD</a></h2><div id="intro"><p>Đọc được dòng chữ này là bạn đã khởi động thành công 360xport!</p><br />Tên blog: <strong>' + bTitle + '</strong><br />Slogan: <strong>' + bDescription + '</strong><br />Tên blogger: <strong>' + blogger + '</strong><br />Số lượng entry cần xử lý: <strong><span id="remain">' + limit + '</span></strong><br /><br /><input type="button" value="Bắt đầu!" id="start" /><br /><br /></div><textarea cols=100" rows="10" id="wxr" readonly="true" onclick="this.select()" style="display:none"></textarea><br /><br /><span id="load" style="display:none"><img src="http://quanganhdo.com/360xport/loading.gif" /><br /><br />Đang load URL <span id="lURL"></span></span>').css({'text-align':'center', 'background-color':'#313032', 'color':'#C0C0C0', 'padding':'10px', 'font-size':'12px', 'font-family':'Verdana'});
output = '';

wxr('\
    <rss version="2.0"\
	    \nxmlns:content="http://purl.org/rss/1.0/modules/content/"\
	    \nxmlns:wfw="http://wellformedweb.org/CommentAPI/"\
	    \nxmlns:dc="http://purl.org/dc/elements/1.1/"\
	    \nxmlns:wp="http://wordpress.org/export/1.0/"\
    >\
    \n<channel>\
	\n<title>' + bTitle + '</title>\
	\n<description>' + bDescription + '</description>\
	\n<generator>360xport version 0.1</generator>\
	\n<language>vi</language>\
');
$('#load').ajaxStart(function() { $(this).show(); }).ajaxStop(function() { $(this).hide(); });

$('#start').click(function() {
    $('#start').val('Đang xử lý... Nếu thấy xử lý một entry nào lâu quá bạn hãy bấm nút này...')
    getEntry();
});

function getEntry() {
    $('#lURL').text(nextURL);
    $.ajax({url:nextURL, complete:handleResponse});
}