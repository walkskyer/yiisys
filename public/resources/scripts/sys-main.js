var Beta24 = {
	urlValidate: function(url) {
		var pattern = /http:\/\/[\w-]*(\.[\w-]*)+/ig;
		return pattern.test(url);
	},
	emailValidate: function(email) {
		var pattern = /^[\w-]+(\.[\w-]+)*@[\w-]+(\.[\w-]+)+$/ig;
		return pattern.test(email);
	},
	imageLazyLoad: function(placeholder) {
		for (i in arguments) {
			if (arguments[i].is('img'))
				arguments[i].lazyload({effect: 'fadeIn', threshold: 200});
		}
	}
};

var BetaPost = {
	increaseVisitNums: function(id, url) {
		if (id <= 0 || url.length == 0) return false;
		var data = 'id=' + id;
		var jqXhr = $.post(url, data, undefined, 'jsonp');
		jqXhr.done(function(data){
			$('.sys-post-detail .sys-visit-nums').text(data);
		});
	},
	digg: function(event) {
		event.preventDefault();
		var tthis = $(this);
		var postid = parseInt(tthis.attr('data-id'));
		var url = tthis.attr('data-url');
		
		var digg_cookie_name = 'beta_digg';
		var _cookies = JSON.parse($.cookie(digg_cookie_name));
		if (!$.isArray(_cookies)) _cookies = [];
		if ($.inArray(postid, _cookies) > -1) return false;
		
		var jqXhr = $.ajax({
			type: 'post',
			url: url,
			data: {pid: postid},
			dataType: 'jsonp',
		});
		
		jqXhr.done(function(data){
			if (data.errno != 0) {
				tthis.find('.digg-count').text(data.digg_nums);
				_cookies.push(postid);
				$.unique(_cookies);
				$.cookie(digg_cookie_name, JSON.stringify(_cookies), {expires:7, path:'/'});
			}
		});
		
		$(document).off('click', '#sys-digg-button');
	},
	create: function(event) {
		var tthis = $(this);
		tthis.find('.sys-control-group').removeClass('error');
		var title = $.trim($('#post-title').val());
		var site = $.trim($('#post-site').val());
		var email = $.trim($('#post-email').val());

		if (title.length == 0) {
			tthis.find('#post-title').parents('.sys-control-group').addClass('error');
			tthis.find('#post-title').focus();
			event.preventDefault();
		}
		else if (site.length > 0 && !Beta24.urlValidate(site)) {
			tthis.find('#post-site').parents('.sys-control-group').addClass('error');
			tthis.find('#post-site').focus();
			event.preventDefault();
		}
		else if (email.length > 0 && !Beta24.emailValidate(email)) {
			tthis.find('#post-email').parents('.sys-control-group').addClass('error');
			tthis.find('#post-email').focus();
			event.preventDefault();
		}
		else if (event.data.content.isEmpty()) {
			tthis.find('#sys-content').parents('.sys-control-group').addClass('error');
			event.data.content.focus();
			event.preventDefault();
		}
		else if (tthis.find('.sys-captcha').length > 0) {
			if (tthis.find('.sys-captcha:visible').length == 0) {
				var captchaEl = tthis.find('.captcha-clearfix img.sys-captcha-img');
				captchaEl.attr('src', captchaEl.attr('lazy-src')).removeAttr('lazy-src');
				tthis.find('.captcha-clearfix').fadeIn('fast');
				tthis.find('.sys-captcha:visible').focus();
				event.preventDefault();
			}
			else {
				var captcha = $.trim(tthis.find('.sys-captcha').val());
				if (captcha.length != 4) {
					tthis.find('.sys-captcha').parents('.sys-control-group').addClass('error');
					tthis.find('.sys-captcha').focus();
					event.preventDefault();
				}
			}
		}
	}
};

var BetaComment = {
	create: function(event){
		event.preventDefault();
		var form = $(this);
		var msg = form.next('.sys-alert-message');
		if (msg.length == 0)
			msg = $('#sys-create-message').clone().removeAttr('id');
		var msgtext = msg.find('.text');
		form.after(msg);

		form.find('input.sys-captcha').blur();

		if (form.find('.sys-control-group.error').length > 0) {
			msgtext.html($('.ajax-jsstr .ajax-rules-invalid').text());
			msg.removeClass('alert-success').addClass('alert-error').show();
			return false;
		}
		else {
			var contentEl = form.find('.comment-content');
			var content = $.trim(contentEl.val());
			var minlen = parseInt(contentEl.attr('minlen'));
			minlen = (isNaN(minlen) || minlen == 0) ? 5 : minlen;
			if (content.length < minlen) {
				msgtext.html($('.ajax-jsstr .ajax-rules-invalid').text());
				msg.removeClass('alert-success').addClass('alert-error').show();
				contentEl.focus();
				return false;
			}
			var captchaEl = form.find('.sys-captcha');
			var captcha = $.trim(captchaEl.val());
			if (captcha.length != 4) {
				msgtext.html($('.ajax-jsstr .ajax-rules-invalid').text());
				msg.removeClass('alert-success').addClass('alert-error').show();
				captchaEl.focus();
				return false;
			}
		}

		var jqXhr = $.ajax({
			type: 'post',
			url: form.attr('action'),
			data: form.serialize(),
			dataType: 'jsonp',
			cache: false,
			beforeSend: function(jqXhr){
				msgtext.html($('.ajax-jsstr .ajax-send').text());
				msg.removeClass('alert-error').addClass('alert-success').show();
			}
		});
		jqXhr.done(function(data){
			msgtext.html(data.text);
			if (data.errno == 0) {
				form.find(':text, textarea').val('');
				form.find('.sys-control-group').removeClass('success error');
				form.find('.sys-control-group').removeClass('alert-success alert-error');
				msg.removeClass('alert-error').addClass('alert-success').show();
				var lastComment = $('.sys-post-show .sys-comment-item:last');
				if (lastComment.length == 0)
					lastComment = $('#sys-comment-list');
				lastComment.after(data.html);
				if (form.attr('id') == undefined) form.remove();
				form.find('.comment-content').addClass('mini');
				$('form .comment-captcha').hide();
				$('.sys-no-comments').remove();
			}
			else {
				msg.removeClass('alert-success').addClass('alert-error').show();
				form.find('.refresh-captcha').trigger('click');
			}
		});
		jqXhr.fail(function(event, jqXHR, ajaxSettings, thrownError){
			jqXhr.abort();
			msgtext.html($('.ajax-jsstr .ajax-fail').text());
			msg.removeClass('alert-success').addClass('alert-error').show();
		});
		return false;
	},
	reply: function() {
		var form = $(this).parents('.sys-comment-item').next('form');
		if (form.length == 0) {
			form = $('#comment-form').clone().removeAttr('id').addClass('comment-reply-form').attr('action', $(this).attr('data-url'));;
			form.find('.comment-captcha').hide();
			form.find(':text, textarea').val('');
			$(this).parents('.sys-comment-item').after(form);
//			form.find('.comment-content').focus();
			form.find('.sys-control-group').removeClass('error success');
		}
		else if (form.filter(':visible').length == 0) {
			form.show();
//			form.find('.comment-content').focus();
		}
		else
			form.hide();

		form.next('.sys-alert-message:visible').hide();
	},
	rating: function(event) {
		event.preventDefault();
		var tthis = $(this);
		var commentItem = tthis.parents('.sys-comment-item');
		var msg = commentItem.next('.sys-alert-message');
		if (msg.length == 0)
			msg = $('#sys-comment-message').clone().removeAttr('id');
		var msgtext = msg.find('.text');

		if (tthis.attr('data-clicked')) {
			msgtext.html($('.ajax-jsstr .ajax-has-joined').text());
			if (msg.hasClass('alert-success')) msg.removeClass('alert-success');
			if (!msg.hasClass('alert-error')) msg.addClass('alert-error');
			commentItem.after(msg);
			msg.show();
			return false;
		}

		var url = tthis.attr('data-url');
		var jqXhr = $.ajax({
			url: url,
			dataType: 'jsonp',
			type: 'post',
			cache: false,
			beforeSend: function(jqXhr) {
				msgtext.html($('.ajax-jsstr .ajax-send').text());
				msg.removeClass('alert-error').addClass('alert-success');
				commentItem.after(msg);
				msg.show();
			}
		});
		jqXhr.done(function(data){
			if (data.errno == 0) {
				var jqnums = tthis.find('.sys-comment-join-nums');
				jqnums.text(parseInt(jqnums.text()) + 1);
				tthis.attr('data-clicked', 1);
				msgtext.html(data.text);
				if (msg.hasClass('alert-error')) msg.removeClass('alert-error');
				if (!msg.hasClass('alert-success')) msg.addClass('alert-success');
			}
			else {
				if (msg.hasClass('alert-success')) msg.removeClass('alert-success');
				if (!msg.hasClass('alert-error')) msg.addClass('alert-error');
			}
			commentItem.after(msg);
			msg.show();
		});
		jqXhr.fail(function(event, jqXHR, ajaxSettings, thrownError){
			msgtext.html($('.ajax-jsstr .ajax-fail').text());
			if (msg.hasClass('alert-success')) msg.removeClass('alert-success');
			if (!msg.hasClass('alert-error')) msg.addClass('alert-error');
			commentItem.after(msg);
			msg.show();
		});
	},
	captchaValidate: function(event){
		var tthis = $(this);
		var captcha = $.trim(tthis.val());
		var help = tthis.parents('.sys-controls').find('.sys-help-inline');
		var helperror = tthis.parents('.sys-controls').find('.sys-help-error');
		var group = tthis.parents('.sys-control-group');

		help.hide();
		if (captcha.length == 4) {
			group.removeClass('error').addClass('success');
			return true;
		}
		else {
			helperror.show();
			group.removeClass('success').addClass('error');
			return false;
		}
	},
	contentValidate: function(event) {
		var tthis = $(this);
		var content = $.trim(tthis.val());
		var minlen = parseInt(tthis.attr('minlen'));
		var group = tthis.parents('.sys-control-group');
		minlen = (isNaN(minlen) || minlen == 0) ? 5 : minlen;
		if (content.length > minlen) {
			group.removeClass('error').addClass('success');
			return true;
		}
		else {
			group.removeClass('success').addClass('error');
			if (content.length == 0) tthis.addClass('mini');
			return false;
		}
	},
	showCaptcha: function(event) {
		var tthis = $(this);
		tthis.removeClass('mini');
		var captchaRow = tthis.parents('form').find('.comment-captcha:hidden');
		if (captchaRow.length == 0) return false;

		var captchaEl = tthis.parents('form').find('img.sys-captcha-img');
		captchaEl.attr('src', captchaEl.attr('lazy-src'));
		captchaEl.trigger('click');
		captchaRow.fadeIn('fast');
	},
	refreshCaptcha: function(event) {
		event.preventDefault();
		var url = $(this).parents('.sys-controls').find('.refresh-captcha').attr('href');
		var jqXhr = $.ajax({
			url: url,
			dataType: 'json',
			cache: false
		});
		jqXhr.done(function(data){
			$('.sys-captcha-img').attr('src', data['url']);
			$('body').data('captcha.hash', [data['hash1'], data['hash2']]);
		});
		return false;
	}
};


