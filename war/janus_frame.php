<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<script>

var canCall = false;
var finished = function(result) { parent.resultDone(document.getElementById("ifrm").src, result); }
var lineBuf = [];
var integerMathLoaded = function() { document.getElementById("ifrm").contentWindow.initRuntime(); console.log("Can call!"); canCall = true; };
var call = function(list, count) {
if (!canCall) throw new Error("Can't call yet; not finished loading");
document.getElementById("ifrm").contentWindow.msg(JSON.stringify(arguments));

document.getElementById("ifrm").contentWindow.run(list);
var pollRate = 50;
var check = function() {
	//alert(lineBuf.length);
	if (lineBuf.length < count) setTimeout(check,pollRate);
	else { finished(lineBuf); while(lineBuf.length!=0)lineBuf.pop(); }
};
setTimeout(check, pollRate);
};
var stdoutLine = function(line) { lineBuf.push(line); };

</script>
<style>
.layer {
position:relative;
height: 100%;
}
body {
margin-top: 2.5em;
text-size: 1em;
background-color:white;
}
iframe {
width:100%;
height:100%;
}
#container {
	position: absolute;
	top: 1em;
	left: 1em;
}
.layerc{
position:absolute;
top:0;
left:0;
width:100%;
height:100%;
}

</style>

</head>
<body>
<div id="container">
<?php echo htmlentities($_GET["frame"]); ?>
</div>
<div class="layer">
<div class="layerc">
<iframe id="ifrm" src="<?php echo htmlentities($_GET["frame"]); ?>"></iframe>
</div>
</div>
</body>
</html>
