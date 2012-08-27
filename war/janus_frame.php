<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
<script>
function setEnable(b) {
if (b)
window["localStdout"] = function(line) {lineBuf.push(line); };
else
window["localStdout"] = function(line) {};
}
var stdoutLine = function(line) { lineBuf.push(line); };
var canCall = false;
var finished = function(result) { console.log("Finished"); parent.resultDone(document.getElementById("ifrm").src, result); }
var lineBuf;
var call = function(list, count) {
if (!canCall) throw new Error("Can't call yet; not finished loading");
lineBuf = [];
setEnable(true);
console.log(JSON.stringify(arguments));
//document.getElementById("ifrm").contentWindow.Module.print=stdoutLine;
document.getElementById("ifrm").contentWindow.run(list);
var pollRate = 50;
var check = function() {
	//alert(lineBuf.length);
	if (lineBuf.length < count) setTimeout(check,pollRate);
	else { setEnable(false); finished(lineBuf.splice(0,count)); }
};
setTimeout(check, pollRate);
};

</script>
<style>
.layer {
position:relative;
height: 100%;
}
body {
margin-top: 5em;
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
	width: 100%;
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
<textarea style="font-family:Terminus,monospace;font-size:10px; width:50%; float:right; " rows=4>
window["resultDone"] = function(src, data) {
	copy(data.join("\n"));
	console.log(data);
}
</textarea>
</div>
<div class="layer">
<div class="layerc">
<iframe id="ifrm" src="<?php echo htmlentities($_GET["frame"]); ?>"></iframe>
</div>
</div>
<script>
document.getElementsByTagName('iframe')[0].onload = function() { canCall = true; };
setEnable(false);
</script>
</body>
</html>
