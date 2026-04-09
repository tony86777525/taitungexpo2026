@extends('user.frontend.layout.wrapper')

@push('styles')
    @vite('resources/scss/user/traffic.scss')
@endpush

@push('scripts')
    @vite('resources/js/user/traffic.js')
@endpush

@section('content')
<main class="main">
    <section class="section section--transpor">
        <div class="section__title">
            <div class="container">
                <span class="title f-title-primary is-pageTitle">交通資訊</span>
            </div>
        </div>
        <div class="section__content">
            <div class="container">
                <div class="goal goal--city">
                    <div class="goal__title f-title-primary is-pageTitle">
                        <span class="title">如何抵達台東</span>
                    </div>
                    <div class="goal__content">
                        <ul class="action">
                            <li><a href="https://tour.taitung.gov.tw/zh-tw/traffic/taitung" class="btn btn--blankPage is-dark" target="_blank"><span class="btn__text">MORE</span></a></li>
                        </ul>
                    </div>
                </div>
                <div class="goal goal--transpor">
                    <div class="goal__title">
                        <span class="title f-title-primary is-pageTitle">如何抵達主展區？</span>
                        <div class="desc"><span class="f-p">台東市區內建議交通方式</span></div>
                    </div>
                    <div class="goal__content">
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">大會接駁車</div>
                                <div class="paragraph f-p">台東博覽會展期期間（7/3–8/20）特別加開大會接駁車班次，串聯主展區與市區重要節點，方便民眾輕鬆往返各展區，建議優先搭乘。</div>
                                <ul class="list">
                                    <li><span class="text">接駁路線及時刻表即將公告。</span></li>
                                </ul>
                                <ul class="action">
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">接駁車時刻與路線</span></a></li>
                                </ul>
                            </div>
                            <div class="transporGroup__image">
                                <div class="imgWrap">
                                    <img src="https://images.unsplash.com/photo-1506905925346-21bda4d32df4?w=800&h=600&fit=crop" alt="">
                                </div>
                            </div>
                        </div>
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">市區公車/客運</div>
                                <div class="paragraph f-p">
                                    喜歡搭乘大眾運輸、彈性安排行程的旅人，可選擇台東市區公車與客運路線，路線涵蓋車站、機場與市區重要節點，適合慢慢移動、沿途探索。
                                </div>
                                <ul class="action">
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">東台灣客運</span></a></li>
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">興東客運</span></a></li>
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">普悠瑪客運</span></a></li>
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">公路客運即時動態資訊網</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">單車漫遊</div>
                                <div class="paragraph f-p">想用自己的節奏感受台東市區的慢活氛圍，單車是最貼近生活的移動方式。沿著市區街道與綠蔭路線前行，在移動之間體驗台東的日常風景，並可善用市區 YouBike，輕鬆串聯各展區與周邊景點！</div>
                                <ul class="action">
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">台東YouBike站點查詢</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">自行開車</div>
                                <div class="paragraph f-p">偏好自由掌握時間、彈性走走停停的旅客，可選擇自行開車前往主展區。台東火車站與機場周邊皆有租車服務，適合規劃多點參觀或延伸行程。</div>
                                <ul class="action">
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">停車與租車資訊</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">復康巴士服務</div>
                                <div class="paragraph f-p">為提供行動不便者更便利的交通選擇，臺東縣設有復康巴士接送服務。服務以輪椅使用者及就醫需求者優先，非設籍民眾亦可依規定自費搭乘，提升整體參與與移動的便利性。</div>
                                <ul class="action">
                                    <li><a href="#" class="btn btn--blank is-dark" target="_blank"><span class="btn__text">復康巴士預約</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="transporGroup">
                            <div class="transporGroup__text">
                                <div class="title f-title-primary">步行</div>
                                <div class="paragraph f-p">主展區周邊展點集中，若住宿於市區或鄰近場域，可選擇步行方式，沿途感受台東街區節奏，讓移動本身成為展覽體驗的一部分！</div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section section--route">
        <div class="section__title wow fadeIn" data-wow-duration="0.5s" data-wow-delay="0.5s">
            <div class="container">
                <span class="title f-title-primary is-pageTitle">推薦路線</span>
            </div>
        </div>
        <div class="section__content">
            <div class="container">
                <div class="routes">
                    <div class="routes__item routesGroup js-routesGroup">
                        <div class="routesGroup__topic">
                            <div class="title">
                                <span class="title__number">1</span>
                                <span class="title__text">藝文展演路線</span>
                            </div>
                            <div class="desc">走進台東市區的藝文場域，感受展覽、展演與創作能量的匯聚。</div>
                        </div>
                        <div class="routesGroup__content">
                            <div class="place">本主展區起點</div>
                            <div class="routesDesc">
                                → 市區主要展覽場館（步行約 10 分鐘）<br>
                                → 周邊藝文展覽空間與展演場域（步行約 15–20 分鐘）<br>
                                → 表演或展演活動場館（單車約 10 分鐘）
                            </div>
                            <div class="notice">
                                本路線集中於台東市區藝文場域，適合以步行搭配單車移動，整體動線流暢。建議預留 約 3–4 小時，可依個人興趣彈性調整停留時間，深入感受台東市區的藝文能量。
                            </div>
                        </div>
                    </div>
                    <div class="routes__item routesGroup js-routesGroup">
                        <div class="routesGroup__topic">
                            <div class="title">
                                <span class="title__number">2</span>
                                <span class="title__text">生活風格路線</span>
                            </div>
                            <div class="desc">從展覽出發，走進台東的日常生活與城市節奏。</div>
                        </div>
                        <div class="routesGroup__content">
                            <div class="place">主展區核心場域</div>
                            <div class="routesDesc">
                                → 生活主題展覽空間（步行約 10 分鐘）<br>
                                → 市集或街區展點（步行約 15 分鐘）<br>
                                → 周邊生活場域與街道空間（單車約 10–15 分鐘）
                            </div>
                            <div class="notice">本路線結合展覽參觀與城市漫遊，節奏輕鬆，適合慢慢行走或騎乘單車。建議安排 約 2–3 小時，在參觀之餘融入台東市區的日常風景與生活節奏。</div>
                        </div>
                    </div>
                    <div class="routes__item routesGroup js-routesGroup">
                        <div class="routesGroup__topic">
                            <div class="title">
                                <span class="title__number">3</span>
                                <span class="title__text">論壇活動路線</span>
                            </div>
                            <div class="desc">聚焦議題交流與公共討論，認識台東正在發生的行動與思考。</div>
                        </div>
                        <div class="routesGroup__content">
                            <div class="place">主展區活動場館</div>
                            <div class="routesDesc">
                                → 論壇／講座場地 A（步行約 5–10 分鐘）<br>
                                → 論壇／工作坊場地 B（步行或短程移動約 10–15 分鐘）
                            </div>
                            <div class="notice">
                                本路線依實際活動時段彈性安排，適合鎖定特定議題或場次參與。建議預留 約 2–4 小時（依場次），可搭配步行或短程交通工具，在不同場館間移動參與交流。
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>
@include('user.frontend.layout.stickyBtns')
@endsection
