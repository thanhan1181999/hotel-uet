<div class="footer">
    <div class="container text-white">
        <div class="row">
        <div class="col-12 col-md-4">
            <div class="introduce">
                <h5>About islaGrande</h5> <br>
                <div>
                    Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
                    Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
                    Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live the blind texts.
                </div>
                <div class="icons">
                    <a href="https://www.facebook.com/BTL-Hotel-103136754520187/?modal=admin_todo_tour">
                        <i class="fa fa-facebook" style="font-size:32px"></i>
                    </a>
                    <a href="http://fb.com/">
                        <i class="fa fa-twitter" style="font-size:32px"></i>
                    </a>
                    <a href="http://fb.com/">
                        <i class="fa fa-instagram" style="font-size:32px"></i>
                    </a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-4">
            <div class="question">
                <h5>Have a Questions ?</h5><br>
                <ul>
                    <li>
                        <i class="fa fa-map-marker" style="font-size:32px"></i>&nbsp;
                        <span>203 Fake St. Mountain View, San Francisco, California, USA</span>
                    </li>
                    <li>
                        <i class='fa fa-phone' style='font-size:32px'></i>&nbsp;
                        <span>+2 392 3929 210</span>
                    </li>
                    <li>
                        <div style="    box-sizing: border-box;width: 100%;overflow-wrap: break-word;">
                            <i class='fa fa-envelope-o' style='font-size:32px'></i>&nbsp;
                            <span>nguyenthanhan1181999@gmail.com</span>
                        </div>
                    </li>
                </ul>
            </div>
        </div>

        <div class="col-12 col-md-4">
            <div class="feedback">
                <h5 class="text-primary">Feedback</h5><br>
                <form class="border-info" action="feedback" method="post">
                    {{csrf_field()}}
                  <div class="input-group mb-1" style="z-index:0!important">
                          <div class="input-group-prepend">
                            <span class="input-group-text border border-primary text-primary">Name</span>
                          </div>
                          <input type="text" class="form-control border border-primary" name="name" required>
                   </div>
                    <div class="input-group mb-1" style="z-index:0!important">
                          <div class="input-group-prepend">
                            <span class="input-group-text border border-primary text-primary">Email&nbsp;</span>
                          </div>
                          <input type="email" class="form-control border border-primary" name="email" required>
                   </div>
                    <div class="input-group mb-1" style="z-index:0!important">
                          <div class="input-group-prepend">
                            <span class="input-group-text border border-primary text-primary">Phone</span>
                          </div>
                          <input type="text" class="form-control border border-primary" name="phone" required>
                   </div>

                   <div class="input-group" style="z-index:0!important">
                      <textarea class="form-control border border-primary" placeholder="Message" name="message" required></textarea>
                    </div>

{{--                   xóa cookie đã click khi gửi feedback --}}
                  <button type="submit" class="btn btn-outline-primary button-feedback" style="position: absolute;z-index:0!important">
                        <i class='fa fa-send-o' style='font-size:32px'></i>
                        Send
                    </button>
                </form>
            </div>

        </div>

        </div>
    </div>
    {{-- <div class="text-sm-center text-white" style="padding:20px;">
        Copyright ©2019 All rights reserved | This template is made with  by Colorlib
    </div> --}}
</div>

{{-- button kích hoạt notice --}}
<button data-toggle="modal" data-target="#notice" style="display: none;" id="button-notice"></button>
<!-- Modal -->
@php
    $notice=session()->pull('notice');
    $levelNotice=session()->pull('levelNotice');
@endphp
@if($notice!="")
<div class="modal fade" id="notice" role="dialog">
<div class="modal-dialog">

  <!-- Modal content--> {{-- booking-form --}}
  <div class="modal-content">
    <div class="modal-header">
      <button type="button" class="close" data-dismiss="modal">&times;</button>
    </div>
    <div class="modal-body">
      @if($levelNotice=='normal')
        <div class="alert alert-info">{{ $notice }}</div>
      @else
        <div class="alert alert-danger">{{ $notice }}</div>
      @endif
    </div>
</div>
@endif
<script type="text/javascript">
  setTimeout(function(){ 
    document.getElementById('button-notice').click();
   }, 400);
</script>