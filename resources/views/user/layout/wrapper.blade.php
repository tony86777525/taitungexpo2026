<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, min-scale=1, max-scale=1, shrink-to-fit=no">
	<title>2026 台東博覽會 TAITUNG EXPO｜SLOW FOR LIFE</title>
	<meta name="description" content="2026台東博覽會，以「慢經濟 ✕ 台東藍 ✕ 永續城鄉發展 ✕ 南島文化」為核心價值，誠摯邀請每一位踏上台東的人，放慢腳步，品味這片土地的靜謐與豐盛，找回生活最純粹的節奏。" />
	<meta name="keywords" content="台東博覽會,台東,東博,Slow for life,慢經濟,永續" />
	<meta name="author" content="臺東縣政府 Taitung County Government">
	<meta property="og:title" content="2026 台東博覽會 TAITUNG EXPO｜SLOW FOR LIFE" />
	<meta property="og:url" content="https://taitungexpo2026.com.tw" />
	<meta property="og:image" content="assets/images/1200x630.png" />
	<meta property="og:site_name" content="2026 TAITUNG EXPO 台東博覽會｜SLOW FOR LIFE">
	<meta property="og:description" content="2026台東博覽會，以「慢經濟 ✕ 台東藍 ✕ 永續城鄉發展 ✕ 南島文化」為核心價值，誠摯邀請每一位踏上台東的人，放慢腳步，品味這片土地的靜謐與豐盛，找回生活最純粹的節奏。">
	<meta property="og:type" content="website" />
	<meta property="og:locale" content="zh_TW" />

	{{-- <link rel="icon" href=""> --}}
	<link rel="shortcut icon" href="" type="image/x-icon">
	<link href="" rel="apple-touch-icon" sizes="16x16">
	<link href="" rel="apple-touch-icon" sizes="32x32">
	<link rel="apple-touch-icon" href="">
	<link rel="apple-touch-icon" sizes="80x80" href="">
	<link rel="apple-touch-icon" sizes="152x152" href="">
	<link rel="apple-touch-icon" sizes="180x180" href="">
	<link rel="apple-touch-icon" sizes="167x167" href="">
    @stack('styles')

    <!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-G4YR7BNNTX"></script>
	<script>
	window.dataLayer = window.dataLayer || [];
	function gtag(){dataLayer.push(arguments);}
	gtag('js', new Date());

	gtag('config', 'G-G4YR7BNNTX');
	</script>
</head>


<body class="lang--zh" data-spy="scroll" data-target=".navbar-collapse">
    {{-- Header --}}
    @include('user.layout.header')
    {{-- Content --}}
    @yield('content')
    
    {{-- Footer --}}
    @include('user.layout.footer')
    
    <script src="{{ asset('js/wow.js') }}"></script>
    <script>
        new WOW().init();
    </script>
    @vite([
        'resources/js/app.js',
        'resources/js/user/common.js',
    ])
    @stack('scripts')
</body>

</html>