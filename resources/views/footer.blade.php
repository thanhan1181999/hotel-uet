
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
                        <a href="">
                            <i class="fa fa-twitter" style="font-size:32px"></i>
                        </a>
                        <a href="">
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
                    <form class="border-info" action="{{ route('feedback')}}" method="post">
                        {{csrf_field()}}
                      <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text border border-primary text-primary">Name</span>
                              </div>
                              <input type="text" class="form-control border border-primary" name="name" required>
                       </div>
                        <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text border border-primary text-primary">Email&nbsp;</span>
                              </div>
                              <input type="text" class="form-control border border-primary" name="email" required>
                       </div>
                        <div class="input-group mb-1">
                              <div class="input-group-prepend">
                                <span class="input-group-text border border-primary text-primary">Phone</span>
                              </div>
                              <input type="text" class="form-control border border-primary" name="phone" required>
                       </div>

                       <div class="input-group">
                          <textarea class="form-control border border-primary" placeholder="Message" name="message" required></textarea>
                        </div>

                      <button type="submit" class="btn btn-outline-primary" style="position: absolute;">
                            <i class='fa fa-send-o' style='font-size:32px'></i>
                            Send
                        </button>
                    </form>
                </div>

            </div>

            </div>
        </div>
        <div class="text-sm-center text-white" style="padding:20px;">
            Copyright ©2019 All rights reserved | This template is made with  by Colorlib
        </div>
    </div>
