
    <div class="wrap">
        <!-- header -->
        <header class="header">
            <div class="inner_center clearfix">
                <h1 class="h_logo_box">
                    <a href="<?php echo base_url()?>"><img src="<?php echo base_url('/assets/images/h_logo.png')?>" alt="리니어펌 로고" class="h_logo"></a>
                </h1>
                <nav class="gnb js-gnb-panel">
                    <ul class="gnb_list">
                        <li class="gnb_item js-gnb-item">
                            <a href="#sectLinearFirm" class="gnb_link js-gnb-link">리니어펌</a>
                            <div class="tag_box"><img src="<?php echo base_url('/assets/images/tag_new.png')?>" alt="new" class="img"></div>
                        </li>
                        <li class="gnb_item js-gnb-item"><a href="#sectCartridge" class="gnb_link js-gnb-link">카트리지</a></li>
                        <li class="gnb_item js-gnb-item"><a href="#sectAdvantage" class="gnb_link js-gnb-link">특장점</a></li>
                        <li class="gnb_item js-gnb-item"><a href="#sectVideo" class="gnb_link js-gnb-link">영상</a></li>
                        <!-- <li class="gnb_item js-gnb-item"><a href="#sectCertification" class="gnb_link js-gnb-link">국제인증</a></li> -->
                        <li class="gnb_item"><a href="<?php echo base_url('/main/hospital_list'); ?>" class="gnb_link ">병원찾기</a></li>
                        <?php if ($this->member->is_admin() === 'super') { ?>
                        <li class="gnb_item"><a href="<?php echo base_url('login/logout'); ?>" class="gnb_link ">Log Out</a></li>
                        <?php } ?>
                    </ul>
                </nav>
                <button type="button" class="h_gnb_button js-gnb-button open"><img src="<?php echo base_url('/assets/images/h_icon_ham.svg')?>" alt="네비게이션 버튼" class="icon"></button>
            </div>
        </header>
        <!-- main -->
        <div class="main" style="margin-top:0px;">
            <!-- 심의용x -->
            
            <div class="quick_link01">
                <!-- 추가 : 리니어펌 검색하기 -->
                <a href="https://search.naver.com/search.naver?sm=top_hty&fbm=0&ie=utf8&query=%EB%A6%AC%EB%8B%88%EC%96%B4%ED%8E%8C" class="link" target="_blank" ><img src="<?php echo base_url('/assets/images/quick_search.png')?>" alt="리니어펌 검색하기" class="img" id="search_naver"></a>
                <!--  -->
                <a href="<?php echo base_url('/main/hospital_list');?>" class="link"><img src="<?php echo base_url('/assets/images/quick_hospital.png')?>" alt="리니어펌 병원찾기" class="img"></a>
            </div>
            
            <!-- 심의용x end -->

            <!-- 상단 비디오 -->
            <div class="video_container01">
                <div class="inner_center" >
                    <?php if($this->cbconfig->get_device_view_type() === 'mobile'){ ?>
                    <video class="video" autoplay loop muted playsinline poster="<?php echo base_url('/assets/images/video_thum_top.png')?>">
                        <source src="<?php echo base_url('/assets/video/video_top_pc4.mp4') ?>" type="video/mp4">;
                        지원하지 않는 브라우저입니다.
                    </video>
                    <?php } else { ?>
                    <video class="video" autoplay loop muted playsinline poster="<?php echo base_url('/assets/images/video_thum_top.png')?>">
                        <source src="<?php echo base_url('/assets/video/video_top_pc4.mp4') ?>" type="video/mp4">;
                        지원하지 않는 브라우저입니다.
                    </video>
                    <?php } ?>
                </div>
            </div>
            <!-- 리니어펌? -->
            <section class="sect_linearfirm" id="sectLinearFirm">
                <div class="inner_center">
                    <div class="img_box">
                        <img src="<?php echo base_url('/assets/images/main.png')?>" alt="기기 이미지" class="img img_pc">
                        <img src="<?php echo base_url('/assets/images/main.png')?>" alt="기기 이미지" class="img img_mo">
                    </div>
                </div>
            </section>

            <!-- 카트리지 -->
            <section class="sect_cartridge" id="sectCartridge">
                <h2 class="title02 fadein_ani_ready">카트리지</h2>
                <div class="inner_center">
                    <div class="txt01 txt_center fadein_ani_ready" style="color:#7f7f7f">
                        13종 카트리지로 피부층별 섬세한 에너지 전달,<br>
                        다양한 깊이에 응고존을 형성시킵니다.                        
                    </div>
                    <div class="txt01 txt_center fadein_ani_ready" style="margin-bottom: 0px;" >
                        [<span class="small" >눈썹</span> 리프팅]
                    </div>
                    <div class="img_box01 txt_center fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/cartridge_01.png')?>" alt="카트리지별 에너지전달 피부층" class="img">
                    </div>

                    <div class="txt01 txt_center fadein_ani_ready" style="margin-bottom: 0px;" >
                        [<span class="small">허벅지</span> 피부 탄력 개선]
                    </div>
                    <div class="img_box01 txt_center fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/cartridge_02.png')?>" alt="카트리지별 에너지전달 피부층" class="img">
                    </div>
                </div>
                <div class="art_cartridge">
                    <div class="art_cartridge_box">
                        <h3 class="title03 title03_left txt_center fadein_ani_ready">
                            <div class="box">
                                <span
                                 class="emph">두 가지 타입의</span> 초음파 카트리지
                            </div>
                        </h3>
                        <div class="txt02 txt_center fadein_ani_ready">
                            도트(점타입) 카트리지 간격이 1~2mm까지 조절 가능하다면,<br>
                            리니어(선타입) 카트리지는 도트 사이의 간격이 0mm로 <br class="mo"> 빈틈이 적고 고르게 에너지를 전달합니다.
                        </div>
                        <ul class="cartridge_type_list01 fadein_ani_ready">
                            <li class="cartridge_type_box">
                                <div class="cartridge_type_img_box"><img src="<?php echo base_url('/assets/images/cartridge_type_01.jpg')?>" alt="점타입" class="img"></div>
                                <div class="cartridge_type_txt_box">점 타입</div>
                            </li>
                            <li class="cartridge_type_box">
                                <div class="cartridge_type_img_box"><img src="<?php echo base_url('/assets/images/cartridge_type_02.jpg')?>" alt="선타입" class="img"></div>
                                <div class="cartridge_type_txt_box">선 타입</div>
                            </li>
                        </ul>
                        <div class="txt03 txt_center">
                            강한 선타입 초음파 에너지로 <span class="small">눈썹</span>리프팅 & <span class="small">허벅지</span> 탄력 개선
                        </div>
                    </div>
                    <div class="art_cartridge_box">
                        <h3 class="title03 title03_right txt_center fadein_ani_ready">
                            <div class="box">
                                <span class="emph">작은 부위에도</span> 시술가능
                            </div>
                        </h3>
                        <div class="txt02 txt_center fadein_ani_ready">
                            좁은 부위에도 시술 가능한 QS 2.0카트리지는<br>
                            카트리지의 너비가 8.7cm로서 눈썹 등 작은 부분에도 시술이 가능합니다.
                        </div>
                        <ul class="cartridge_type_list01 fadein_ani_ready">
                            <!-- <li class="cartridge_type_box">
                                <img src="<?php echo base_url('/assets/images/cartridge_type_03.jpg')?>" alt="12.5mm" class="img">
                                <div class="cartridge_type_txt_box">width : 12.5mm</div>
                            </li> -->
                            <li class="cartridge_type_box">
                                <img src="<?php echo base_url('/assets/images/cartridge_type_04.jpg')?>" alt="8.6mm" class="img">
                                <div class="cartridge_type_txt_box">width : 8.7cm</div>
                            </li>
                        </ul>
                    </div>
                </div>
            </section> 
            <!-- 시술원리 -->
            <section class="sect_treatment_principle">
                <h2 class="title02 fadein_ani_ready">시술원리</h2>
                <div class="txt01 txt_center fadein_ani_ready">
                    집속형초음파 트랜스듀서에서 출력된 초음파 에너지의 <br class="mo">열작용을 이용하여 <br class="pc">
                    조직을 응고시켜 <span class="emph">'눈썹 리프팅 및 <?php if($this->cbconfig->get_device_view_type() === 'mobile') echo '<br>'; ?> 허벅지 피부탄력 개선'</span> 을 합니다. <br>
                    다양한 종류의 카트리지를 통해 피부 얕은 층부터 깊은 층까지<br>
                    응고존 형성이 가능합니다.
                </div>
                <ul class="treatment_step_list clearfix">
                    <li class="treatment_step_box fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/treatment_step_01.png')?>" alt="step1 집속형 초음파 에너지" class="img img_pc">
                        <img src="<?php echo base_url('/assets/images/treatment_step_mo_01.png')?>" alt="step1 집속형 초음파 에너지" class="img img_mo">
                    </li>
                    <li class="treatment_step_box fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/treatment_step_02.png')?>" alt="step2 열작용으로 응고존 형성" class="img img_pc">
                        <img src="<?php echo base_url('/assets/images/treatment_step_mo_02.png')?>" alt="step2 열작용으로 응고존 형성" class="img img_mo">
                    </li>
                    <li class="treatment_step_box fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/treatment_step_03.png')?>" alt="step3 조직 응고, 피부 수축 효과" class="img img_pc">
                        <img src="<?php echo base_url('/assets/images/treatment_step_mo_03.png')?>" alt="step3 조직 응고, 피부 수축 효과" class="img img_mo">
                    </li>
                    <li class="treatment_step_box fadein_ani_ready">
                        <img src="<?php echo base_url('/assets/images/treatment_step_04.png')?>" alt="eyebrow lifting" class="img img_pc">
                        <img src="<?php echo base_url('/assets/images/treatment_step_mo_04.png')?>" alt="eyebrow lifting" class="img img_mo">
                    </li>
                </ul>
            </section>
            <!-- 특장점 -->
            <section class="sect_advantage" id="sectAdvantage">
                <h2 class="title02 fadein_ani_ready">특장점</h2>
                <ul class="advantage_list clearfix">
                    <li class="advantage_box txt_center fadein_ani_ready">
                        <div class="advantage_what"><img src="<?php echo base_url('/assets/images/advantage_what_title_01.png')?>" alt="what? 01" class="img"></div>
                        <div class="advantage_txt_box">
                            <div class="advantage_txt">
                                편안한 시술로<br>
                                <span class="emph">빠른 일상 복귀</span>
                            </div>
                        </div>
                        <div class="advantage_img_box">
                            <img src="<?php echo base_url('/assets/images/advantage_what_img_01.png')?>" alt="예시이미지" class="img">
                        </div>
                    </li>
                    <li class="advantage_box txt_center fadein_ani_ready">
                        <div class="advantage_what"><img src="<?php echo base_url('/assets/images/advantage_what_title_02.png')?>" alt="what? 02" class="img"></div>
                        <div class="advantage_txt_box">
                            <div class="advantage_txt">
                                선타입 에너지가<br>
                                넓은 면적에 적용해<br>
                                <span class="emph">빠른 시술시간</span>
                            </div>
                        </div>
                        <div class="advantage_img_box">
                            <img src="<?php echo base_url('/assets/images/advantage_what_img_02.png')?>" alt="예시이미지" class="img">
                        </div>
                    </li>
                    <!-- <li class="advantage_box txt_center fadein_ani_ready">
                        <div class="advantage_what"><img src="<?php echo base_url('/assets/images/advantage_what_title_03.png')?>" alt="what? 03" class="img"></div>
                        <div class="advantage_txt_box">
                            <div class="advantage_txt">
                                라인타입<br>
                                에너지 조사 방식으로<br>
                                <span class="emph">고른 에너지 전달</span>
                            </div>
                        </div>
                        <div class="advantage_img_box">
                            <img src="<?php echo base_url('/assets/images/advantage_what_img_03.png')?>" alt="예시이미지" class="img">
                        </div>
                    </li> -->
                    <li class="advantage_box txt_center fadein_ani_ready">
                        <div class="advantage_what"><img src="<?php echo base_url('/assets/images/advantage_what_title_03.png')?>" alt="what? 04" class="img"></div>
                        <div class="advantage_txt_box">
                            <div class="advantage_txt">
                                개인마다 다른<br>
                                피부 두께와<br>
                                원하는 부위에 맞는<br>
                                <span class="emph">카트리지 선택</span>
                            </div>
                        </div>
                        <div class="advantage_img_box">
                            <img src="<?php echo base_url('/assets/images/advantage_what_img_03.png')?>" alt="예시이미지" class="img">
                        </div>
                    </li>
                </ul>
            </section>
            <!-- 중단 비디오 -->
            <div class="video_container02" id="sectVideo">
                <div class="video_box">
                    <video class="video" controls poster="<?php echo base_url('/assets/images/video_thum_pc.jpg')?>">
                        <?php 
                        if($this->cbconfig->get_device_view_type() === 'mobile')
                            echo '<source src="'.base_url('/assets/video/video_mid_mo.mp4').'" type="video/mp4">' ;
                        else 
                            echo '<source src="'.base_url('/assets/video/video_mid_pc.mp4').'" type="video/mp4">' ;
                         ?>
                        
                        지원하지 않는 브라우저입니다.
                    </video>
                    <div class="video_tag txt_right">광고심의필 : 심의 번호 2019ET1450463</div>
                </div>

            </div>
            <!-- 국제인증 -->
            <!-- <section class="sect_certification" id="sectCertification">
                <h2 class="title02 fadein_ani_ready">국제인증</h2>
                <div class="txt01 txt_center fadein_ani_ready">‘리니어펌’은 세계 각국에서 인증 받은 장비입니다.
                </div>
                <div class="img_box fadein_ani_ready">
                    <img src="<?php echo base_url('/assets/images/certifications_03.png')?>" alt="인증서 2020 Europe, 2019 Israel, 2018 Australia, 2018 Taiwan" class="img img_pc">
                    <img src="<?php echo base_url('/assets/images/certifications_mo_03.png')?>" alt="인증서 2020 Europe, 2019 Israel, 2018 Australia, 2018 Taiwan" class="img img_mo">
                </div>
            </section> -->
        </div>
        <?php echo $this->managelayout->display_footer()?>         
    </div>

    <script>


        function search_naver() {
            var flag=false;
            var href;
                
            ga('send', 'event', 'button', 'click');

            href ='https://search.naver.com/search.naver?sm=top_hty&fbm=0&ie=utf8&query=%EB%A6%AC%EB%8B%88%EC%96%B4%ED%8E%8C';            
            // window.open(href, '_blank'); 


            // return false;
        }

        $(function(){
            //모바일 헤더 여닫기
            var $gnbPanel = $('.js-gnb-panel')
            var $gnbBtn = $('.js-gnb-button')
            function openGnb(){
                $gnbPanel.slideDown(400,function(){
                    $gnbBtn.removeClass('open');
                    $(this).stop(true,true);
                });
            }
            function closeGnb(){
                $gnbPanel.slideUp(400,function(){
                    $gnbBtn.addClass('open');
                    $(this).stop(true,true);
                    $gnbPanel.css('display','');
                });
            }
            
            $gnbBtn.on('click',function(){
                var gnbBtnClass = $(this).hasClass('open');
                if(gnbBtnClass == true){
                    openGnb();
                }else{
                    closeGnb();
                }
                
            });
            
            // SCROLLSPY (메인페이지만)                            
            function scrollSpy() {
                var mh = $('.header').height();

                $(".js-gnb-link").removeClass("active"); //we remove active from every menu element

                //we get the divs offsets looping the menu links and getting the targets (this is dynamic: when we change div #suzy's height, code won't break!)
                var divs = [];
                $(".js-gnb-item:not('.noscroll') a").each(function(i) {
                    var appo = $(this).attr("href");
                    //here we get the distance from top of each div
                    divs[i] = $(appo).offset().top;
                });

                //gets actual scroll and adds window height/2 to change the active menu voice when the lower div reaches half of screen (it can be changed)
                var pos = $(window).scrollTop();
                var off = ($(window).height()) / 2;

                pos = pos + off;

                //we parse our "div distances from top" object (divs) until we find a div which is further from top than the actual scroll position(+ of course window height/2). When we find it, we assign "active" class to the Nth menu voice which is corresponding to the last div closer to the top than the actual scroll -> trick is looping from index=0 while Nth css numeration starts from 1, so when the index=3 (fourth div) breaks our cycly, we give active to the third element in menu.
                var index = 0;

                for (index = 0; index < divs.length; index++) {
                    if (pos < divs[index]) {
                        break;
                    }
                }
                index--;
                $(".js-gnb-item:not('.noscroll'):eq(" + index + ")").addClass("active");
            };

            $(window).scroll(function() {
                scrollSpy();
            });
            $(document).ready(function() {
                <?php if(element('section',$view)){?>
                    var offset = $('#<?php echo element("section",$view);?>').offset();
                    $('html, body').animate({scrollTop : offset.top-40}, 40);
                <?php }  ?>
                
            });
            
            // header 메뉴 클릭시 scroll animation
            $(".js-gnb-item:not('.noscroll')>a").on("click", function() {
                var menuId = $(this).attr('href');
                var scrollName = $(menuId).offset().top;
                $('html,body').animate({
                    scrollTop: scrollName - 60
                }, 400, 'swing');

                if(!$gnbBtn.hasClass('open')) closeGnb();
                
                return false;
            });
            
            // 스크롤했을때 병원찾기 아래에서 나왔다가 들어갔다하는
            // $(window).scroll(function(){
            //  if ( 10 < $(document).scrollTop() )
            //  {
            //      $(".quick_link01").removeClass('off');
            //  } else{
            //      $(".quick_link01").addClass('off');
            //  }
            // });

            
            
            //스크롤시 요소 fadeIn animation
            $(window).scroll(function() {
                $(".fadein_ani_ready").each(function() {
                    paragraphMiddle = $(this).offset().top + (0.5 * $(this).height());
                    windowBottom = $(window).scrollTop() + $(window).height();

                    if (paragraphMiddle < windowBottom) {
                        $(this).addClass("fadein_ani");
                    }
                });
            });

            
        //end
        });
        $(window).load(function(){
            var floatPosition = parseInt($(".quick_link01").offset().top);

            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                var newPosition = scrollTop + floatPosition + "px";

                $(".quick_link01").stop().animate({
                    "top" : newPosition,
                },{
                    'duration' : 500,
                    'easing' : 'easeOutCirc',
                });
                // console.log(floatPosition,scrollTop);

            });
            
            /* On Load: Trigger Scroll Once*/
            $(window).scroll();
        });
        
    </script>
