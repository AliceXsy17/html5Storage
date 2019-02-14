<!DOCTYPE html>
<html lang="zh-CN" manifest="manifest.appcache">
<!-- 如果想要manifest失效，要这样做： 注释掉上面的manifest，
	然后再服务器端把manifest.appcache随便改个名称就行了，如：manifest00.appcache -->
<!-- <html lang="zh-CN"> -->
<head>
	<meta charset="UTF-8" />
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0" />
	<meta name="MobileOptimized" content="320" />
	<title>H5中的离线缓存</title>
	<link rel="stylesheet" type="text/css" href="./css/assets.css">
</head>
<body>
<h1>APP Cache Demo</h1>
<ul>
	<li><img src="./img/1.jpg" alt="" title=""></li>
	<li><img src="./img/2.jpeg" alt="" title=""></li>
</ul>

<script type="text/javascript">

	window.addEventListener('load', function(e) {
		window.applicationCache.addEventListener('updateready', function(e) {
			console.log(window.applicationCache.status);
			if (window.applicationCache.status === window.applicationCache.UPDATEREADY) {
				window.applicationCache.swapCache();
				if (confirm('A new version of this site is available. Load it')) {
					window.location.reload();
				}
			} else {
				console.log('manifest didn\'t change');
				// Manifest didn't changed. Nothing new to server.
			}
		}, false);
	}, false);
	


	/**
	 * 什么是离线缓存（offline application）?
	 * 它可以让web应用在离线的情况下继续使用，通过manifest文件指明需要缓存的资源
	 * 
	 * 检测是否在线（有网络）的方法：
	 * navigator.onLine 值为 true 代表在线的，否则离线的
	 *
	 * application cache离线缓存的两个缺点：
	 * 一、更改了manifest文件了，刷新浏览器第一次是不生效的，如果有缓存直接返回缓存的内容，只有第二次才生效，
	 * 二、如果有一个文件更新了，需要修改manifest文件， 但它会把里面所有的缓存文件全部拉取一次，这是一个损耗。
	 */
</script>
</body>
</html>