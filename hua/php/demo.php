 <meta charset="UTF-8">
    <title>demo</title>
    <link rel="stylesheet" href="css/style.css"/>
    <script type="text/javascript" src="../js/demo.js"></script>
</head>
<body>
<table id="cartTable">
    <thead>
        <tr>
            <th><label><input class="check-all check" type="checkbox"/>&nbsp;全选</label></th>
            <th>商品</th>
            <th>单价</th>
            <th>数量</th>
            <th>小计</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <tr>
        
            <td class="checkbox"><input class="check-one check" type="checkbox"/></td>
            <td class="goods"><img src="images/1.jpg" alt=""/><span>Casio/卡西欧 EX-TR350</span></td>
            <td class="price">5999.88</td>
            <td class="count"><span class="reduce"></span><input class="count-input" type="text" value="1"/><span class="add">+</span></td>
            <td class="subtotal">5999.88</td>
            <td class="operation"><span class="delete">删除</span></td>
        </tr>
    </tbody>
</table>
<div class="foot" id="foot">
    <label class="fl select-all"><input type="checkbox" class="check-all check"/>&nbsp;全选</label>
    <a class="fl delete" id="deleteAll" href="javascript:;">删除</a>
    <div class="fr closing">结 算</div>
    <div class="fr total">合计：￥<span id="priceTotal">0.00</span></div>
    <div class="fr selected" id="selected">已选商品<span id="selectedTotal">0</span>件</div>
</div>
</body>