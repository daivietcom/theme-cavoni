<div class="row">
  <div class="col-lg-12 comment-widget">
    <hr>
    <textarea class="form-control" rows="4"></textarea>
    <div class="comment-button">
      <button class="btn btn-default btn-sm comment-emoticon"><i class="fa fa-smile-o fa-2x"></i></button>
      <button class="btn btn-warning btn-sm comment-send">{{ __('Send') }}</button>
    </div>
    <div class="row comment-header">
      <div class="col-lg-12 comment-title">
      @if($total == 0)
        {{ __('No comment') }}
      @elseif ($total == 1)
        {{ __('1 comment') }}
      @else
        {{ __(':total comments', ['total'=>number_format($total)]) }}
      @endif
    </div>
    </div>
    <div class="comment-list">
      @foreach ($comments as $comment)
      <div class="media" data-id="{{$comment['id']}}">
        <div class="media-left">
          <img alt="{{ $comment['author']['name'] }}" class="media-object" data-src="holder.js/40x40?text={{ name_to_char($comment['author']['name']) }}&amp;size=20&amp;bg=ddd&amp;fg=666" src="{{ $comment['avatar'] }}">
        </div>
        <div class="media-body comment-body">
          <strong class="media-heading">
            {{ $comment['author']['name'] }}
            @if ($comment['is_admin'])
              <span class="label label-warning">{{ __('AD') }}</span>
            @endif
          </strong>
          {!! $comment['content'] !!}
          <div class="comment-action">
            <a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}"><i class="fa fa-reply"></i> {{ __('Reply') }}</a>
            <span class="comment-time"><i class="fa fa-clock-o"></i> {{ before_time($comment['created_at']) }}</span>
          </div>
          <div class="comment-replies"{!! (!empty($comment['replies'])?' style="display:block;"':'')!!}>
            @foreach ($comment['replies'] as $reply)
              <div class="media" data-id="{{$reply['id']}}">
                <div class="media-left">
                  <img alt="{{ $reply['author']['name'] }}" class="media-object" data-src="holder.js/40x40?text={{ name_to_char($reply['author']['name']) }}&amp;size=20&amp;bg=ddd&amp;fg=666" src="{{ $reply['avatar'] }}">
                </div>
                <div class="media-body comment-body">
                  <strong class="media-heading">
                    {{ $reply['author']['name'] }}
                    @if ($reply['is_admin'])
                      <span class="label label-warning">{{ __('AD') }}</span>
                    @endif
                  </strong>
                  {!! $reply['content'] !!}
                  <div class="comment-action">
                    <a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}"><i class="fa fa-reply"></i> {{ __('Reply') }}</a>
                    <span class="comment-time"><i class="fa fa-clock-o"></i> {{ before_time($reply['created_at']) }}</span>
                  </div>
                </div>
              </div>
            @endforeach
          </div>
        </div>
      </div>
      @endforeach
    </div>
    @if ($total > 10)
    <a href="javascript:void(0)" data-offset="{{count($comments)}}" class="btn btn-default btn-lg btn-block comment-load">{{ __('Load more comments') }}</a>
    @endif
  </div>
</div>
@push('head')
@endpush
@push('script')

  <script type="text/javascript">
    var post_id = {{ $post_id }};
    function emojioneAreaReply($element, content) {
      if(content == undefined) content = '';
      $element[0].emojioneArea.setText(content);
      $('body,html').animate({
          scrollTop: $element.next().offset().top - $(window).height() / 3
      }, 800);
    }


    function commentDialog() {
        var $login = $.Dialog.default({
            title: __('Login'),
            message: '<form class="box-auth" method="post" action="/login">' +
            '<div class="row">' +
            '<div class="col-sm-6">' +
            '<p>' +
            __('Sign in using your registered account') +
            '</p>' +
            '<div class="form-group has-feedback">' +
            '<div class="input-group">' +
            '<span class="input-group-addon"><i class="fa fa-user"></i></span>' +
            '<input class="form-control" type="text" name="email" placeholder="' +
            __('Email or phone number') +
            '">' +
            '</div>' +
            '</div>' +
            '<div class="form-group has-feedback">' +
            '<div class="input-group">' +
            '<span class="input-group-addon fixed"><i class="fa fa-key"></i></span>' +
            '<input class="form-control" type="password" name="password" placeholder="' +
            __('Password') +
            '">' +
            '</div>' +
            '</div>' +
            '<button class="btn btn-success pull-right">' +
            __('Login') +
            '</button>' +
            '<div class="checkbox">' +
            '<label><input type="checkbox" name="remember" value="1">' +
            __('Keep me logged in') +
            '</label>' +
            '</div>' +
            '</div>' +
            '<div class="col-sm-6">' +
            '<div class="box-auth-social">' +
            '<p>' +
            __('Sign in using social network') +
            '</p>' +
            '<a onclick="socialAuthorize(\'facebook\')" class="btn btn-block btn-social btn-facebook">' +
            '<i class="fa fa-facebook"></i> ' +
            __('Login with Facebook') +
            '</a>' +
            '<a onclick="socialAuthorize(\'google\')" class="btn btn-block btn-social btn-google">' +
            '<i class="fa fa-google"></i> ' +
            __('Login with Google') +
            '</a>' +
            '</div>' +
            '<div class="box-auth-footer">' +
            '<p>' +
            __("Don't have an account?") +
            ' <a href="#">' +
            __('Sign Up') +
            '</a></p>' +
            '<p><a href="#">' +
            __('Forgot your password?') +
            '</a></p>' +
            '</div>' +
            '</div>' +
            '<div class="clearfix"></div>' +
            '</form>',
            backdrop: true,
            class: 'dialog-login'
        });
        $login.on('shown.bs.modal', function () {
            $login.find('.box-auth').on('submit', function (e) {
                e.preventDefault();
                var author = $(this).serialize();
            });
        });
    }

    function sendComment(content, parent) {
      if(USER_ID == undefined) {

      } else {
        ajaxComment({
          post_id: post_id,
          content: content,
          parent: parent
        });
      }
    }

    function ajaxComment(data) {
      $.ajax({
        url: BASE_URL + '/comment',
        data: data,
        type: 'POST',
        dataType: 'json',
        beforeSend: function() {
          loading();
        },
        success: function(result){
          loading(true);
          if(result.success) {
            $.notify(__('Ok'),{
              type: 'success'
            });
            var $element = $('<div class="media" style="display:none;" data-id="'+result.data.id+'">'+
            '<div class="media-left">'+
            '<img alt="'+result.data.author.name+'" class="media-object" data-src="holder.js/40x40?text='+result.data.name_to_char+'&amp;size=20&amp;bg=ddd&amp;fg=666" src="'+result.data.avatar+'">'+
            '</div>'+
            '<div class="media-body comment-body">'+
            '<strong class="media-heading">'+result.data.author.name+
            (result.data.is_admin?' <span class="label label-warning">{{ __('AD') }}</span>':'')+
            '</strong>'+result.data.content+
            '<div class="comment-action">'+
              '<a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}"'+
              (result.data.parent == null?'':' data-tag="@'+result.data.author.name+':"')+
              '><i class="fa fa-reply"></i> {{ __('Reply') }}</a>'+
              '<span class="comment-time"><i class="fa fa-clock-o"></i> {{ __('1 second ago') }}</span>'+
            '</div>'+
            '</div>'+
            '</div>');
            if(result.data.parent == null) {
              $('.comment-list').prepend($element);
            } else {
              $('.media[data-id="'+result.data.parent+'"] .comment-replies').show().append($element);
            }
            $element.fadeIn('slow');
            iniReply();
          } else {
            $.notify(result.message,{
              type: 'danger'
            });
          }
        },
        error: function(xhr,status,error){
          loading(true);
          $.notify(error,{
            type: 'danger'
          });
        },
      });
    }

    function iniReply() {
      $('.comment-reply').off('click').on('click', function(event) {
        event.preventDefault();
        /* Act on the event */
        var tag = $(this).data('tag');
        var $parent = $(this).parents('.comment-body');
        var id = $parent.parents('.media').data('id');
        var $textarea = $parent.find('textarea');
        var $button = $parent.find('button.comment-btn');
        if($textarea.length == 0) {
          $textarea = $('<textarea class="form-control"></textarea>');
          $button = $('<button class="btn btn-default btn-xs comment-btn">{{ __('Send') }}</button>');
          $parent.append($textarea);
          $textarea.emojioneArea({
        	   pickerPosition: "bottom",
             hidePickerOnBlur: false,
             placeholder: '{{ __('Write a comment...') }}'
          });
          $parent.append($button);
        }
        $button.off('click').on('click', function(event) {
            var content = $textarea[0].emojioneArea.getText();
            if(content.length == 0) {
              $.notify('{{ __('Write a comment...') }}',{
              	type: 'warning'
              });
            } else {
              sendComment(content, id);
            }
        });
        if($textarea[0].emojioneArea.getText().length > 0) {
          $.Dialog.confirm('{{ __('Content') }}', '{{ __('Title') }}', ['{{ __('Cancel') }}', '{{ __('Ok') }}'], function(ret) {
            if(ret == true) {
              emojioneAreaReply($textarea, tag);
            }
          });
        } else {
          emojioneAreaReply($textarea, tag);
        }
      });
    }

    function iniReplyLoad() {
      $('.comment-replies-load').off('click').on('click', function(event) {
        event.preventDefault();

        var $this = $(this);
        var offset = $this.data('offset');

        var $parent = $this.parents('.media');
        var parent_id = $parent.data('id');
        $.ajax({
          url: BASE_URL + '/comment/replies',
          data: {
            offset: offset,
            parent_id: parent_id
          },
          type: 'GET',
          dataType: 'json',
          beforeSend: function() {
            $this.hide();
          },
          success: function(result){
              $.each(result, function(index, el) {
                var $element = $('<div class="media" data-id="'+el.id+'">'+
                '<div class="media-left">'+
                '<img alt="'+el.author.name+'" class="media-object" data-src="holder.js/40x40?text='+el.name_to_char+'&amp;size=20&amp;bg=ddd&amp;fg=666"'+
                (el.avatar == null?'':' src="'+el.avatar+'"') +
                '>'+
                '</div>'+
                '<div class="media-body comment-body">'+
                '<strong class="media-heading">'+el.author.name+
                (el.is_admin?' <span class="label label-warning">{{ __('AD') }}</span>':'')+
                '</strong>'+el.content+
                '<div class="comment-action">'+
                  '<a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}" data-tag="@'+el.author.name+'"><i class="fa fa-reply"></i> {{ __('Reply') }}</a>'+
                  '<span class="comment-time"><i class="fa fa-clock-o"></i> '+el.time+'</span>'+
                '</div>'+
                '</div>'+
                '</div>');
                $parent.find('.comment-body>.comment-replies').append($element);
                Holder.run({
                  images: $element.find('img')[0]
                });
              });
              $parent.find('.comment-body>.comment-replies').show();
              iniReply();
              if(result.length >= 10) {
                $this.find('span').text('{{__('Load more replies')}}');
                $this.data('offset', offset+10);
                $this.show();
              }
          },
          error: function(xhr,status,error){
            $.notify(error,{
              type: 'danger'
            });
          },
        });
      });
    }

    $(document).ready(function() {
      $('.comment-load').on('click', function(event) {
        event.preventDefault();

        var $this = $(this);
        var offset = $this.data('offset');
        $.ajax({
          url: BASE_URL + '/comment',
          data: {
            offset: offset,
            post_id: post_id
          },
          type: 'GET',
          dataType: 'json',
          beforeSend: function() {
            $this.hide();
          },
          success: function(result){
              $.each(result, function(index, el) {
                var $element = $('<div class="media" data-id="'+el.id+'">'+
                '<div class="media-left">'+
                '<img alt="'+el.author.name+'" class="media-object" data-src="holder.js/40x40?text='+el.name_to_char+'&amp;size=20&amp;bg=ddd&amp;fg=666"'+
                (el.avatar == null?'':' src="'+el.avatar+'"') +
                '>'+
                '</div>'+
                '<div class="media-body comment-body">'+
                '<strong class="media-heading">'+el.author.name+
                (el.is_admin?' <span class="label label-warning">{{ __('AD') }}</span>':'')+
                '</strong>'+el.content+
                '<div class="comment-action">'+
                  '<a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}"><i class="fa fa-reply"></i> {{ __('Reply') }}</a>'+
                  '<span class="comment-time"><i class="fa fa-clock-o"></i> '+el.time+'</span>'+
                '</div>'+
                '<div class="comment-replies"></div>' +
                '</div>'+
                '</div>');
                $.each(el.replies, function(key, val) {
                    var $reply = $('<div class="media" data-id="'+val.id+'">'+
                    '<div class="media-left">'+
                    '<img alt="'+val.author.name+'" class="media-object" data-src="holder.js/40x40?text='+val.name_to_char+'&amp;size=20&amp;bg=ddd&amp;fg=666"'+
                    (val.avatar == null?'':' src="'+val.avatar+'"') +
                    '>'+
                    '</div>'+
                    '<div class="media-body comment-body">'+
                    '<strong class="media-heading">'+val.author.name+
                    (val.is_admin?' <span class="label label-warning">{{ __('AD') }}</span>':'')+
                    '</strong>'+val.content+
                    '<div class="comment-action">'+
                      '<a class="comment-reply" href="javascript:void(0)" title="{{ __('Reply') }}"><i class="fa fa-reply"></i> {{ __('Reply') }}</a>'+
                      '<span class="comment-time"><i class="fa fa-clock-o"></i> '+val.time+'</span>'+
                    '</div>'+
                    '</div>'+
                    '</div>');
                    $element.find('.comment-replies').append($reply);
                });
                $('.comment-list').append($element);
                if (el.replies.length > 0) {
                  $element.find('.comment-replies').show();
                }
                Holder.run({
                  images: '.comment-list img.media-object'
                });
              });
              if(result.length >= 10) {
                $this.data('offset', offset+10);
                $this.show();
              }
          },
          error: function(xhr,status,error){
            $.notify(error,{
              type: 'danger'
            });
          },
        });

      });
    });
  </script>
@endpush
