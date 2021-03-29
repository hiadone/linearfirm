<?php 

$this->managelayout->add_head("<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-M5Z4BTJ');</script>
<!-- End Google Tag Manager -->"); 

$this->managelayout->add_head("<!-- Facebook Pixel Code -->
<script>
!function(f,b,e,v,n,t,s)
{if(f.fbq)return;n=f.fbq=function(){n.callMethod?
n.callMethod.apply(n,arguments):n.queue.push(arguments)};
if(!f._fbq)f._fbq=n;n.push=n;n.loaded=!0;n.version='2.0';
n.queue=[];t=b.createElement(e);t.async=!0;
t.src=v;s=b.getElementsByTagName(e)[0];
s.parentNode.insertBefore(t,s)}(window, document,'script',
'https://connect.facebook.net/en_US/fbevents.js');
fbq('init', '1753298861503613');
fbq('track', 'PageView');
</script>
<noscript><img height='1' width='1' style='display:none'
src='https://www.facebook.com/tr?id=1753298861503613&ev=PageView&noscript=1'
/></noscript>
<!-- End Facebook Pixel Code -->"); 
 ?>
    <div class="wrap02">
        <header class="header02">
            <div class="inner_center">
                <h1 class="img_box" onClick="javascript:console.log(event.offsetX,event.offsetY)">
                    <?php 
                        if($this->cbconfig->get_device_view_type() === 'mobile')
                            echo '<img src="'.base_url('/assets/images/hospital_list_header_mo_01.jpg').'" alt="리니어펌 운영 병원 리스트" class="img img_mo" usemap="#Map">' ;
                        else 
                            echo '<img src="'.base_url('/assets/images/hospital_list_header_01.jpg').'" alt="리니어펌 운영 병원 리스트" class="img img_pc" usemap="#Map" >' ;
                         ?>
                    <map name="Map" id="Map">
                        <area shape="rect" coords="70,80,472,236" onClick="javascript:location.href='/'"  style="cursor:pointer">
                    </map>



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
        <?php echo $this->managelayout->display_footer() ?>
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
