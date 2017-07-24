

var YIJ = YIJ || {};
$(document).ready(function(){
	YIJ.common = {
		pass:{tel:false,pwd:false,pwd2:false,readme:false},
		init: function(){

			var bannerH = $('.banner').height();
			var $header = $('header');
			$(window).scroll(function(){
				var scrollH = $(document).scrollTop();
				if( scrollH > bannerH  ){
					$header.addClass('hover');
				}else{
					$header.removeClass('hover');
				}
			})
			this.bindEvent();
			// this.bannerAnimate();
			if( typeof $.fn.lazyload == 'function' ){
				$('img').lazyload({
					effect: "fadeIn"
				});
			}
		},
		bindEvent: function(){
			var that = this;
			$('.btn_consult').click(function(){
				if( $(this).hasClass('disable') ){
					return;
				}else{
					$(this).addClass('disable');
				}
				var type = $(this).data('type'),$consultbox = $(this).closest('.consultbox'),reg = /^1\d{10}$/;
				var name = $.trim( $consultbox.find('input[name="name"]').val() ),tel = $.trim( $consultbox.find('input[name="tel"]').val() ),remarks = $.trim( $consultbox.find('textarea[name="remarks"]').val() );
				if( name == '' || tel == '' || remarks == '' ){
					that.showConsultTip(type,'请先完善信息');
					$('.btn_consult').removeClass('disable');
					return false;
				}
				if( !reg.test(tel) ){
					that.showConsultTip(type,'请填写正确手机号');
					$('.btn_consult').removeClass('disable');
					return false;
				}
				that.consult(type,name,tel,remarks);
			})
			$('.modal').on('hide.bs.modal', function() {
				$(this).find('li').removeClass('pass').find('input[type="text"],input[type="password"]').val('').removeClass('error');
				$(this).find('textarea').val('');
				$('.tiptext,.errortip').text('');
			})

			//校验注册登录
			$('#tel,#telLogin,#telForget').blur(function(event) {
				that.checkTel(null,$(this));
			});
			$('#pwd,#pwd2,#newPwd,#newPwd2').blur(function(event) {
				if( $(this).attr('id') == 'pwd' ){
					var pwd2 = $('#pwd2')
				}else{
					var pwd2 = $('#pwd')
				}
				that.checkPwd( $(this),pwd2 );
			});
			$('.btn_vcode').click(function(){
				if( $(this).hasClass('enable') ){
					var telInput = $(this).closest('li').prev().find('[name="tel"]')
					that.checkTel(that.getVcode,telInput);
				}
			})
			$('#registerBtn').click(function(){
				if( !$('#readme').is(':checked') ){
					that.showError('','请先选中同意《有一居用户使用协议》');
					return false;
				}
				var isPass = false;
				$.each(that.pass,function(key,val){
					if( !val ){
						if( key == 'tel' ){
							that.checkTel();
						}
						if( key == 'pwd' || key == 'pwd2' ){
							if( key == 'pwd' ){
								var pwd2 = $('#pwd2')
							}else{
								var pwd2 = $('#pwd')
							}
							that.checkPwd( $('#'+key),pwd2 );
						}
						return false;
					}
					isPass = true;
				})
				if( isPass ){
					that.register();
				}
			})
			$('#loginBtn').click(function(event) {
				if( $('#telLogin').val() == '' ){
					$('#telLogin').focus();
					return false;
				}else{
					that.checkTel( null,$('#telLogin') );
					if( !that.pass.tel ){
						return false;
					}
				}
				if( $('#pwdLogin').val() == '' ){
					$('#pwdLogin').focus();
					return false;
				}
				that.login();
			});
			$('#resetPwdBtn').click(function(event) {
				if( $('#telForget').val() == '' ){
					$('#telForget').focus();
					return false;
				}else{
					that.checkTel( null,$('#telForget') );
					if( !that.pass.tel ){
						return false;
					}
				}
				that.checkPwd( $('#newPwd'),$('#newPwd2') );
				that.resetPassword();
			});
			
			$('#toRegister').click(function(event) {
				$('#loginModal').modal('hide');
				$('#registerModal').modal('show');
			})
			$('#toLogin').click(function(event) {
				$('#registerModal').modal('hide');
				$('#loginModal').modal('show');
			})
			$('#forgetPassword').click(function(event) {
				$('#loginModal').modal('hide');
				$('#forgetModal').modal('show');
			})
			$('#backTop').click(function(event) {
				$('html, body').animate({scrollTop: 0},300);
			})
			$('[data-scroll]').click(function(event) {
				var $target = $( $(this).data('scroll') );
				var h = $target.offset().top;
				$('html, body').animate({scrollTop: h+'px'},300);
			})
			$('.playvideo').click(function(event) {
				$('#videoPlayWrap').fadeIn();
				$('#movie').trigger('play');
			})
			$('#videoPlayWrap .close').click(function(){
				$('#videoPlayWrap').hide();
				$('#movie').trigger('pause');
			})

		},
		bannerAnimate: function(){
			var index = 1,$pic = $('.carousel .pic_item'),picLen = $pic.length,loops = 1;
			if( picLen <= 1 ){ return false; }
			setInterval(function(){
				if( loops == 1 ){
					var $curImg = $(".carousel img").eq(index);
					$curImg.attr('src',$curImg.data('original'));
					$curImg[0].loaded = true;	//阻止lazyload二次加载
				}
				$pic.eq(index).fadeIn(1000).siblings().fadeOut(1500);
				index++;
				if(index == picLen){index = 0;loops++;}
			},7000);
		},
		consult: function(type,name,tel,remarks){
			var that = this;
			$.ajax({
				url: '/house/ajaxask',
				type: 'post',
				data: {'tel':tel,'user_name':name,'remarks':remarks},
				dataType: 'json',
				success: function(json){
					$('.btn_consult').removeClass('disable');
					var data = json.data;
					if( json.code == 0 ){
						that.showConsultTip(type,json.msg,0);
					}else{
						that.showConsultTip(type,json.msg);
					}
				}
			})
		},
		showConsultTip: function(type,tip,ajaxCode){
			var that = this;
			if( type == 'detail' ){
				$('#tipBox .errortip').text(tip);
				$('#tipBox').modal('show');
			}else{
				$('#consultModal .errortip').text(tip);
				if( ajaxCode == 0 ){
					$('#consultModal').modal('hide');
					that.successTip(tip);
				}
			}
		},
		getVcode: function(vcodeBtn){
			var that = this,tel = $.trim( vcodeBtn.closest('.modal-body').find('[name="tel"]').val() );
			$.ajax({
				url: '/user/sendcode',
				type: 'post',
				data: {'tel':tel},
				dataType: 'json',
				success: function(json){
					var data = json.data;
					if( json.code == 0 ){
						vcodeBtn.attr("disabled", true);
						var i = 60;
						vcodeBtn.val(i + '秒后重新获取');
						var timer = setInterval(function () {
							i--;
							vcodeBtn.val(i + '秒后重新获取');
							if (i <= 0) {
								clearInterval(timer);
								vcodeBtn.attr("disabled", false).val('获取短信验证码');
							}
						}, 1000);
					}else if( json.code == 1010 ){
						YIJ.common.showError(vcodeBtn.prev(),json.msg);
					}else{
						var vcodeInput = vcodeBtn.prev();
						YIJ.common.showError(vcodeInput,'验证码发送失败,请稍后重试');
					}
				}
			})
		},
		checkTel: function(callback,tel){
			var that = this, reg = /^1\d{10}$/;
			$('.btn_vcode').removeClass('enable');
			if( $.trim( tel.val() ) == '' ){
				that.showError(tel,'请填写手机号码');
				return false;
			}
			if( !reg.test(tel.val()) ){
				that.showError(tel,'手机号码格式不正确');
				return false;
			}
			if( typeof callback == 'function' ){
				callback( tel.closest('.modal-body').find('.btn_vcode') );
			}
			that.passCheck(tel);
			$('.btn_vcode').addClass('enable');
		},
		checkPwd: function(pwd,pwd2){
			var that = this;
			if( pwd == '' || pwd2 == '' ){
				that.showError(pwd,'请输入密码');
				return false;
			}
			if((/>|<|,|\[|\]|\{|\}|\?|\/|\+|=|\||\'|\\|\"|:|;|\~|\!|\@|\#|\*|\$|\%|\^|\&|\(|\)|`/i).test(pwd.val())){
				that.showError(pwd,'请勿用特殊字符');
				return false;
			}
			if( pwd.val().indexOf(" ") > -1){
				that.showError(pwd,'请不要输入空格');
				return false;
			}
			if( pwd.val().length < 6 || pwd.val().length > 20 ){
				that.showError(pwd,'密码长度要求6-20个字符');
				return false;
			}
			if( $.trim(pwd2.val()) != '' ){
				if( pwd.val() != pwd2.val() ){
					that.showError(pwd,'两次输入的密码不一致');
					return false;
				}else{
					that.passCheck(pwd);
				}
			}
			that.passCheck(pwd);
		},
		showError: function( obj,msg ){
			if( obj != '' ){
				obj.addClass('error');
				obj.closest('li').removeClass('pass');
			}
			$('.errortip').text(msg)
		},
		passCheck: function(obj){
			var that = this,key = obj.attr('name');
			that.pass[key] = true;
			obj.removeClass('error').closest('li').addClass('pass');
			that.showError( '','' )
		},
		register: function(){
			var that = this,tel = $.trim( $('#tel').val() ),pwd = $('#pwd').val(),pwd2 = $('#pwd2').val(),vcode = $('#vcode').val();
			$.ajax({
				url: '/user/register',
				type: 'post',
				data: {'tel':tel,'password':pwd,'confirmPassword':pwd2,'code':vcode},
				dataType: 'json',
				success: function(json){
					var data = json.data;
					if( json.code == 0 ){
						$('#registerModal').modal('hide');
						window.location.reload();
					}
				}
			})
		},
		login: function(){
			var that = this,tel = $.trim( $('#telLogin').val() ),pwd = $('#pwdLogin').val();
			$.ajax({
				url: '/user/login',
				type: 'post',
				data: {'tel':tel,'password':pwd},
				dataType: 'json',
				success: function(json){
					var data = json.data;
					if( json.code == 0 ){
						$('#loginModal').modal('hide');
						window.location.reload();
					}else{
						that.showError( '',json.msg );
					}
				}
			})
		},
		resetPassword: function(){
			var that = this,tel = $.trim( $('#telForget').val() ),pwd = $('#newPwd').val(),pwd2 = $('#newPwd2').val(),vcode = $('#vcodeForget').val();
			$.ajax({
				url: '/user/reset',
				type: 'post',
				data: {'tel':tel,'password':pwd,'confirmPassword':pwd2,'code':vcode},
				dataType: 'json',
				success: function(json){
					var data = json.data;
					if( json.code == 0 ){
						$('#forgetModal').modal('hide');
					}
				}
			})
		},
		showLoading: function(){
			var load = '<div class="loading" id="loading"></div>';
			$('body').append(load);
			$('#loading').show();
		},
		hideLoading: function(){
			$('#loading').remove();
		},
		successTip: function(tip){
			var that = this;
			if( $('#successTip').length <= 0 ){
				$('body').append('<div class="success_tip" id="successTip"></div>');
			}
			$('#successTip').html(tip).fadeIn();
			setTimeout(function(){
				$('#successTip').fadeOut();
			},3000)
		}
	}
	YIJ.common.init();
})