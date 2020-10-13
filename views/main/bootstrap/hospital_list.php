<?php 

$this->managelayout->add_head("<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5Z4BTJ');</script>
<!-- End Google Tag Manager -->"); 
 ?>
    <div class="wrap02">
        <header class="header02">
            <div class="inner_center">
                <h1 class="img_box">
                    <?php 
                        if($this->cbconfig->get_device_view_type() === 'mobile')
                            echo '<img src="'.base_url('/assets/images/hospital_list_header_mo_01.jpg').'" alt="리니어펌 운영 병원 리스트" class="img img_mo">' ;
                        else 
                            echo '<img src="'.base_url('/assets/images/hospital_list_header_01.jpg').'" alt="리니어펌 운영 병원 리스트" class="img img_pc">' ;
                         ?>
                </h1>
                <span class="blind">본 페이지는 해당 병원의 권유나 추천이 아닌, 정보 전달의 목적으로 제작되었습니다.</span>
            </div>
        </header>
        <div class="main" style="margin-top:0px;">
            <div class="quick_link01">
                <!-- 추가 : 리니어펌 검색하기 -->
                <a href="https://search.naver.com/search.naver?sm=top_hty&fbm=0&ie=utf8&query=%EB%A6%AC%EB%8B%88%EC%96%B4%ED%8E%8C" class="link" target="_blank" ><img src="<?php echo base_url('/assets/images/quick_search.png')?>" alt="리니어펌 검색하기" class="img" id="search_naver"></a>
                <!--  -->
                <a href="<?php echo base_url();?>"><img src="<?php echo base_url('/assets/images/quick_detail.png')?>" alt="리니어펌 병원찾기" class="img"></a>
            </div>
            <div class="list_wrap">
            <?php 
                if (element('list',element('data', $view))) {
                    foreach (element('list',element('data', $view)) as $key => $result) {
             ?>
            


                <div class="list_container">
                    <div class="txt_center">
                        <h2 class="title04">
                            <?php 
                            if (element('modify_url', $result)) { 
                                        
                                echo '<a href="'.element('modify_url', $result).'">'.element('hgr_title',$result).'</a>';
                                echo ' <a href="'.admin_url('page/hospital').'?hgr_id='.element('hgr_id',$result).'" class="btn btn-success btn-sm">지역구 관리</a>';
                                
                            } else {
                                echo element('hgr_title',$result);
                            } 
                            ?>
                            
                        </h2>
                    </div>

                    
                
                    <!-- <?php 
                        if (element('modify_url', $result)) {                                     
                            
                            echo '<a href="'.admin_url('page/hospital').'?hgr_id='.element('hgr_id',$result).'"><span class="glyphicon glyphicon-list" style="font-size:100px;margin-top:20px;"> </span>지역구 리스트</a>';
                            
                        } 
                        ?> -->
                    <ul class="hos_list clearfix">
                        <?php 
                            if (element('hlist',$result)) {
                                foreach (element('hlist',$result) as $hkey => $hresult) {
                                    

                         ?>
                            <li class="hos_box" <?php echo $this->member->is_admin() ? 'onclick=\'location.href="'.admin_url('page/hospital/write/'.element('hpt_id',$hresult)).'?hgr_id='.element('hgr_id',$result).'"\';': '';?>>
                                <div class="hos_cell">
                                    <div class="hos_name">
                                        <p><?php echo element('hpt_title',$hresult); ?></p>
                                        <p><?php echo element('hpt_addr',$hresult); ?></p>
                                    </div>
                                    <div class="hos_address">
                                        <svg class="icon" x="0px" y="0px"
                                        width="16" height="24" viewBox="0 0 16 24">
                                            <g>
                                                <path d="M8,1C3.9,1,0.6,4.3,0.6,8.4C0.6,12.5,8,23,8,23s7.4-10.5,7.4-14.6C15.4,4.3,12.1,1,8,1z M8,12
                                                    c-2.2,0-4-1.8-4-4c0-2.2,1.8-4,4-4c2.2,0,4,1.8,4,4C12,10.2,10.2,12,8,12z"></path>
                                            </g>
                                        </svg>
                                        <?php echo element('hpt_addr_sub',$hresult); ?>
                                    </div>
                                </div>
                            </li>
                                
                        <?php 
                                }
                        ?>
                                
                                <?php 
                                if($this->member->is_admin()){
                                ?>
                                    <li class="hos_box" style="text-align: center;" onclick='location.href="<?php echo admin_url('page/hospital/write?hgr_id='.element('hgr_id',$result))?>";'>
                                            <span class="glyphicon glyphicon-plus-sign " style="font-size:100px;margin-top:20px;"> </span>
                                        </li>
                                <?php } ?>
                                    
                                    
                                
                        <?php 
                            } else {
                        ?>      
                           
                                
                                <?php 
                                if($this->member->is_admin()){
                                ?>
                                    <li class="hos_box" style="text-align: center;" onclick='location.href="<?php echo admin_url('page/hospital/write?hgr_id='.element('hgr_id',$result))?>";'>
                                            <span class="glyphicon glyphicon-plus-sign " style="font-size:100px;margin-top:20px;"> </span>
                                        </li>
                                <?php } ?>
                           
                        <?php 
                            }
                        ?>
                        
                    </ul>
                    
                </div>                
                <?php 
                        }   
                        ?>
                        <?php 
                        if (element('write_url', $result)) { 
                                    
                            echo ' <div class="list_container">
                    <div class="txt_center"><h2 class="title04"><a href="'.element('write_url', $result).'"><span class="glyphicon glyphicon-plus" ></span> 도시 추가</a></h2></div></div>';
                                    
                        } 
                        ?>
                <?php 
                    } 
                ?>
            <?php if (element('list_url', $view)) { ?>
                <div class="hos_list ">
                    <a href="<?php echo element('list_url', $view); ?>" class="btn btn-success btn-sm">병원 관리</a>
                </div>
            <?php } ?>
            </div>
        </div>
        <!-- footer -->
        <footer class="footer">
            <div class="footer_inner_center">
                <div class="logo_img"><img src="<?php echo base_url('/assets/images/logo_jeisys.svg')?>" alt="제이시스 로고" class="img"></div>
                <div class="txt_container">
                    <div class="txt">(주)제이시스메디칼 | 대표명 : 강동환 | 사업자등록번호 : 119-81-75293</div>
                    <div class="txt">주소 : 서울시 금천구 가산동 481-11 대륭테크노타워 8차 307,308,401,410 | TEL : 02.2603.6417</div>
                    <div class="txt">
                        Mail : marketing@jeisys.com | 광고심의필 : 심의번호 
                        <?php if($this->cbconfig->get_device_view_type() === 'mobile'){ ?>
                            2020-I10-14-1253
                        <?php } else { ?>
                            2020-ET1-14-0144
                        <?php } ?>
                    </div>
                    <div class="txt">품목명 : 집속형초음파자극시스템으로, 집속된 초음파를 이용하여, 조직을 응고시켜 눈썹을 리프팅하는데 사용하는 기구입니다.</div>
                    <div class="txt txt_ml">이 제품은 ‘의료기기’이며, ‘사용상주의사항’과 ‘사용방법’을 잘 읽고 사용하십시오.
                    </div>
                </div>
                <div class="sns_box">
                    <a href="https://www.youtube.com/channel/UCqAKu5loQ8arXmiVQ-SFXQQ?view_as=subscriber" class="sns_link sns_youtube"><img src="<?php echo base_url('/assets/images/logo_youtube.svg')?>" alt="제이시스 유튜브" class="img"></a>
                    <a href="https://www.instagram.com/jeisysmedical_kr/" class="sns_link sns_instagram"><img src="<?php echo base_url('/assets/images/logo_instagram.svg')?>" alt="제이시스 인스타그램" class="img"></a>
                </div>
            </div>
        </footer>
    </div>

    <script>
        $(window).load(function(){
            // $(window).scroll(function(){
            //  if ( 10 < $(document).scrollTop() )
            //  {
            //      $(".quick_link01").removeClass('off');
            //  } else{
            //      $(".quick_link01").addClass('off');
            //  }
            // });

            var floatPosition = parseInt($(".quick_link01").offset().top);

            $(window).scroll(function() {
                var scrollTop = $(window).scrollTop();
                var newPosition = scrollTop + floatPosition + "px";

                $(".quick_link01").stop().animate({
                    "top" : newPosition
                },{
                    'duration' : 400,
                    'easing' : 'easeOutCirc',
                });

            }).scroll();

            $(window).scroll();
        });
    </script>
