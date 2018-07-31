<!doctype html>
<html>
<head>
<meta charset="utf-8">
<script language="javascript" src="../js/pcasunzip.js" charset="gb2312"></script>

<script type="text/javascript">
</script>
</head>
<body>
<select name="province" onblur="setStyle()" id="province" value="<?php echo @$_GET['province'] ?>"></select>
<select name="city" id="city" onblur="setStyle()" value="<?php echo @$_GET['city'] ?>"></select>
<select name="area" id="area" onblur="setStyle()" value="<?php echo @$_GET['area'] ?>"></select>
<script language="javascript" defer>
new PCAS("province","city","area","--请选择省份--","--请选择城市--","--请选择地区--");

</script>
<br>
</body>
</html>