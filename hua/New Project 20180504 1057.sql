-- MySQL Administrator dump 1.4
--
-- ------------------------------------------------------
-- Server version	5.0.51b-community-nt-log


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;


--
-- Create schema hua
--

CREATE DATABASE IF NOT EXISTS hua;
USE hua;

--
-- Definition of table `admin`
--

DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `admin_id` int(50) unsigned NOT NULL COMMENT '管理员编号',
  `admin_name` varchar(45) NOT NULL COMMENT '管理员名称',
  `admin_pass` varchar(45) NOT NULL COMMENT '密码',
  `admin_tel` varchar(45) NOT NULL COMMENT '手机',
  `admin_addr` varchar(45) NOT NULL COMMENT '地址',
  `admin_type` varchar(45) NOT NULL COMMENT '管理员类型',
  PRIMARY KEY  (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='管理员表';

--
-- Dumping data for table `admin`
--

/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`admin_id`,`admin_name`,`admin_pass`,`admin_tel`,`admin_addr`,`admin_type`) VALUES 
 (1001,'黄梅丽','123456','13132680639','河池学院','普通管理员');
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;


--
-- Definition of table `book`
--

DROP TABLE IF EXISTS `book`;
CREATE TABLE `book` (
  `book_id` int(50) unsigned NOT NULL auto_increment COMMENT '订单编号',
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `get_id` int(50) unsigned NOT NULL COMMENT '收货人信息编号',
  `book_time` date NOT NULL COMMENT '产生时间',
  `send_time` date NOT NULL COMMENT '发货时间',
  `get_time` date NOT NULL COMMENT '收货时间',
  `sum_price` varchar(45) NOT NULL COMMENT '总金额',
  `state` varchar(45) NOT NULL COMMENT '订单状态',
  `getmoeny` varchar(45) NOT NULL COMMENT '是否已经付钱',
  `money_id` int(30) unsigned NOT NULL COMMENT '付钱方式',
  `get_hua` varchar(145) NOT NULL COMMENT '留言',
  PRIMARY KEY  (`book_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='订单表';

--
-- Dumping data for table `book`
--

/*!40000 ALTER TABLE `book` DISABLE KEYS */;
INSERT INTO `book` (`book_id`,`user_id`,`get_id`,`book_time`,`send_time`,`get_time`,`sum_price`,`state`,`getmoeny`,`money_id`,`get_hua`) VALUES 
 (16,2018119,16,'2018-04-09','0000-00-00','0000-00-00','894','待发货','',22,''),
 (17,2018120,17,'2018-04-10','0000-00-00','0000-00-00','596','待发货','',22,'');
/*!40000 ALTER TABLE `book` ENABLE KEYS */;


--
-- Definition of table `cart`
--

DROP TABLE IF EXISTS `cart`;
CREATE TABLE `cart` (
  `mx_id` int(50) unsigned NOT NULL auto_increment COMMENT '编号',
  `good_id` int(45) unsigned NOT NULL COMMENT '商品编号',
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `good_num` varchar(45) NOT NULL COMMENT '数量',
  `cart_time` date NOT NULL COMMENT '时间',
  PRIMARY KEY  (`mx_id`)
) ENGINE=InnoDB AUTO_INCREMENT=99 DEFAULT CHARSET=utf8 COMMENT='购物车';

--
-- Dumping data for table `cart`
--

/*!40000 ALTER TABLE `cart` DISABLE KEYS */;
INSERT INTO `cart` (`mx_id`,`good_id`,`user_id`,`good_num`,`cart_time`) VALUES 
 (2,13,2018113,'7','2018-04-08'),
 (3,6,2018113,'1','2018-04-08'),
 (4,11,2018113,'1','2018-04-08'),
 (73,5,2018102,'9','2018-04-09'),
 (74,6,2018102,'2','2018-04-09'),
 (75,9,2018102,'3','2018-04-09'),
 (76,14,2018102,'1','2018-04-09'),
 (77,31,2018119,'1','2018-04-09'),
 (78,30,2018119,'1','2018-04-09'),
 (79,15,2018119,'1','2018-04-09'),
 (80,16,2018119,'1','2018-04-09'),
 (81,30,2018102,'2','2018-04-10'),
 (82,31,2018102,'4','2018-04-10'),
 (83,30,2018120,'4','2018-04-10'),
 (89,31,2018120,'2','2018-04-10'),
 (90,19,2018120,'2','2018-04-10'),
 (91,14,2018120,'1','2018-04-10'),
 (92,24,2018120,'1','2018-04-10'),
 (93,25,2018120,'1','2018-04-10'),
 (94,26,2018120,'5','2018-04-10'),
 (95,0,2018102,'1','2018-04-30'),
 (96,12,2018102,'3','2018-04-30'),
 (97,25,2018102,'1','2018-04-30'),
 (98,13,2018102,'1','2018-04-30');
/*!40000 ALTER TABLE `cart` ENABLE KEYS */;


--
-- Definition of table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE `comments` (
  `commet_id` int(30) unsigned NOT NULL auto_increment COMMENT '评价编号',
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `good_id` int(45) unsigned NOT NULL COMMENT '商品编号',
  `content` varchar(100) NOT NULL COMMENT '评价内容',
  `comment_time` date NOT NULL COMMENT '评价时间',
  PRIMARY KEY  (`commet_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='评价表';

--
-- Dumping data for table `comments`
--

/*!40000 ALTER TABLE `comments` DISABLE KEYS */;
/*!40000 ALTER TABLE `comments` ENABLE KEYS */;


--
-- Definition of table `getinfo`
--

DROP TABLE IF EXISTS `getinfo`;
CREATE TABLE `getinfo` (
  `get_id` int(50) unsigned NOT NULL auto_increment COMMENT '收货人编号',
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `get_name` varchar(45) NOT NULL COMMENT '收货人姓名',
  `get_tel` varchar(45) NOT NULL COMMENT '收货人手机号码',
  `get_add` varchar(100) NOT NULL COMMENT '收货人地址',
  `get_post` varchar(45) NOT NULL COMMENT '收货人邮编',
  PRIMARY KEY  (`get_id`)
) ENGINE=InnoDB AUTO_INCREMENT=18 DEFAULT CHARSET=utf8 COMMENT='收货人信息表';

--
-- Dumping data for table `getinfo`
--

/*!40000 ALTER TABLE `getinfo` DISABLE KEYS */;
INSERT INTO `getinfo` (`get_id`,`user_id`,`get_name`,`get_tel`,`get_add`,`get_post`) VALUES 
 (7,2018109,'黄梅丽','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','123'),
 (8,2018110,'黄梅丽','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','123'),
 (9,2018111,'黄梅丽','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','123'),
 (10,2018112,'黄梅丽','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','123'),
 (11,2018113,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','123456'),
 (12,2018114,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','12312421'),
 (13,2018115,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','12312421'),
 (14,2018116,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','23242'),
 (15,2018118,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','23242'),
 (16,2018119,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','23242'),
 (17,2018120,'刘杜','13132680639','广西壮族自治区贵港市平南县大安镇燕岭村三屯五号','2243');
/*!40000 ALTER TABLE `getinfo` ENABLE KEYS */;


--
-- Definition of table `getly`
--

DROP TABLE IF EXISTS `getly`;
CREATE TABLE `getly` (
  `re_id` int(50) unsigned NOT NULL auto_increment COMMENT '反馈编号',
  `ly_id` int(50) unsigned NOT NULL COMMENT '留言编号',
  `content` varchar(100) NOT NULL COMMENT '回复内容',
  `re_time` date NOT NULL COMMENT '回复时间',
  PRIMARY KEY  (`re_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='回复反馈表';

--
-- Dumping data for table `getly`
--

/*!40000 ALTER TABLE `getly` DISABLE KEYS */;
/*!40000 ALTER TABLE `getly` ENABLE KEYS */;


--
-- Definition of table `getmoney`
--

DROP TABLE IF EXISTS `getmoney`;
CREATE TABLE `getmoney` (
  `money_id` int(30) unsigned NOT NULL auto_increment,
  `get_money` varchar(45) NOT NULL COMMENT '付钱方式',
  `get_img` varchar(45) NOT NULL COMMENT '图片',
  `get_mo` varchar(45) NOT NULL COMMENT '账号',
  `get_type` varchar(45) NOT NULL COMMENT '付款类型',
  `get_user` varchar(45) NOT NULL COMMENT '开户人',
  PRIMARY KEY  (`money_id`)
) ENGINE=InnoDB AUTO_INCREMENT=23 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `getmoney`
--

/*!40000 ALTER TABLE `getmoney` DISABLE KEYS */;
INSERT INTO `getmoney` (`money_id`,`get_money`,`get_img`,`get_mo`,`get_type`,`get_user`) VALUES 
 (13,'在线支付','../money/2018032505493624.png','123456','支付宝','黄梅丽'),
 (14,'在线支付','../money/20180325055118112.png','123456','微信','黄梅丽'),
 (15,'在线支付','../money/20180325055148312.png','123456','paypal','黄梅丽'),
 (16,'线下银行支付','../money/20180325055555386.png','123456','中国工商银行','黄梅丽'),
 (17,'线下银行支付','../money/20180325055620921.png','123456','中国建设银行','黄梅丽'),
 (18,'线下银行支付','../money/20180325055641139.png','123456','中国农业银行','黄梅丽'),
 (19,'线下银行支付','../money/20180325055703768.png','123456','中国邮政银行','黄梅丽'),
 (20,'线下银行支付','../money/20180325055719647.png','123456','招商银行','黄梅丽'),
 (21,'线下银行支付','../money/20180325055817227.png','123456','中国银行','黄梅丽'),
 (22,'货到付款','../money/20180402021434157.png','货到付款','货到付款','黄梅丽');
/*!40000 ALTER TABLE `getmoney` ENABLE KEYS */;


--
-- Definition of table `goods`
--

DROP TABLE IF EXISTS `goods`;
CREATE TABLE `goods` (
  `good_id` int(45) unsigned NOT NULL auto_increment COMMENT '商品编号',
  `good_name` varchar(45) NOT NULL COMMENT '商品名称',
  `good_price` varchar(45) NOT NULL COMMENT '价格',
  `good_hua` varchar(100) NOT NULL COMMENT '花语',
  `good_num` int(45) unsigned NOT NULL COMMENT '库存',
  `sum` varchar(45) NOT NULL COMMENT '总数',
  `main_img` varchar(45) NOT NULL COMMENT '主要图片',
  `good_img` text NOT NULL COMMENT '其他图片',
  `flower_num` int(56) unsigned NOT NULL COMMENT '朵数',
  `sales` int(50) unsigned NOT NULL COMMENT '销量',
  `material` varchar(100) NOT NULL COMMENT '材料',
  `prime_cost` int(45) unsigned NOT NULL COMMENT '原价',
  `buy_price` int(45) unsigned NOT NULL COMMENT '进口价',
  `good_use` varchar(100) NOT NULL COMMENT '用途',
  `festival` varchar(100) NOT NULL COMMENT '适合节日',
  `packing` varchar(100) NOT NULL COMMENT '包装',
  `object` varchar(45) NOT NULL COMMENT '适合对象',
  `kind_id` int(50) unsigned NOT NULL COMMENT '种类',
  `good_time` date NOT NULL COMMENT '入库时间',
  `details_img` varchar(145) NOT NULL COMMENT '细节图',
  PRIMARY KEY  (`good_id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

/*!40000 ALTER TABLE `goods` DISABLE KEYS */;
INSERT INTO `goods` (`good_id`,`good_name`,`good_price`,`good_hua`,`good_num`,`sum`,`main_img`,`good_img`,`flower_num`,`sales`,`material`,`prime_cost`,`buy_price`,`good_use`,`festival`,`packing`,`object`,`kind_id`,`good_time`,`details_img`) VALUES 
 (5,'爱的思念----手提式花篮','251','爱的思念绵延不绝，终于和天在地平线上交汇......有一种很玄的东西叫思念，思念是是甜蜜，夹杂着淡淡苦涩，被人思念，也是一种被爱的幸福。',25,'25','../rederimg/20180317033423850.jpg','../other/201803172498.jpg*../other/201803171640.jpg',24,0,'红玫瑰12枝，红色康乃馨12枝，填充红豆、绿叶适量（如当地红豆缺货，用相思梅等其他寓意相近配材替代。）',191,20,'爱情鲜花','情人节、生日、结婚纪念日、元旦','有柄花篮一个，墨绿色缎带花结一个（花篮款式以各城市实际出货为准）','恋人',2,'2018-03-17',''),
 (6,'不变的承诺----99枝红玫瑰','768','下雨的时候，给她撑一把雨伞；寒冷的时候，给她一个温暖的臂弯；天黑了，永远有一盏灯为她点亮；晨起时，给她一缕温暖的阳光。爱她，就送她一束99枝的玫瑰花！',23,'23','../rederimg/20180317052110616.jpg','../other/20180317222.jpg*../other/201803172114.jpg*../other/2018031753.jpg',99,0,'99枝红玫瑰',599,100,'告白、爱情，生日，情人节','结婚、情人节、结婚纪念日、元旦','黑色雪梨纸，黑色条纹纸，玻璃纸卷，酒红色缎带花结',' 朋友 , 同事 , 同学 , 偶像',3,'2018-03-17',''),
 (9,'永恒的誓言','461','如果今生的缘只让我爱你,那就让我把所有的思念累积,换来生永不分离，I love you！',12,'12','../rederimg/201803171275.jpg','',33,0,'33支混色玫瑰（6支香槟玫瑰+10支红玫瑰+7支白玫瑰+10支粉玫瑰）搭配2只可爱小熊。',461,100,'送爱人、送老婆','情人节、生日、结婚纪念日、元旦','高档灰色硬纸外包装，精美条纹丝带',' 朋友 , 客户 , 同学 , 偶像',2,'2018-03-17','../other/201803173807.jpg*../other/201803173177.jpg*../other/201803171275.jpg'),
 (10,'永恒的誓言','461','如果今生的缘只让我爱你,那就让我把所有的思念累积,换来生永不分离，I love you！',12,'12','../rederimg/20180317501.jpg','../other/20180317656.jpg*../other/201803172728.jpg*../other/201803172056.jpg',33,0,'33支混色玫瑰（6支香槟玫瑰+10支红玫瑰+7支白玫瑰+10支粉玫瑰）搭配2只可爱小熊。',461,100,'送爱人、送老婆','情人节、生日、结婚纪念日、元旦','高档灰色硬纸外包装，精美条纹丝带',' 朋友 , 客户 , 同学 , 偶像',2,'2018-03-17','../other/201803173240.jpg*../other/201803171636.jpg*../other/20180317501.jpg'),
 (11,'永恒的誓言','461','如果今生的缘只让我爱你,那就让我把所有的思念累积,换来生永不分离，I love you！',12,'12','../rederimg/201803171811.jpg','../other/201803172054.jpg*../other/201803172510.jpg*../other/201803173367.jpg',33,0,'33支混色玫瑰（6支香槟玫瑰+10支红玫瑰+7支白玫瑰+10支粉玫瑰）搭配2只可爱小熊。',461,100,'送爱人、送老婆','情人节、生日、结婚纪念日','高档灰色硬纸外包装，精美条纹丝带',' 朋友 , 客户 , 同学 , 偶像',2,'2018-03-17','../other/20180317446.jpg*../other/201803171146.jpg*../other/201803171811.jpg'),
 (12,'温柔如你','202','走在风中今天阳光，突然好温柔，天的温柔，地的温柔，像你抱着我，把我最好的爱给你，是我全部的温柔。',12,'12','../rederimg/201803183583.jpg','../other/201803182203.jpg*../other/201803182944.jpg*../other/201803183080.jpg*../other/20180318630.jpg*../other/201803182509.png*../other/2018031',19,0,'戴安娜粉玫瑰12枝，石竹梅7枝，叶上花适量',259,130,'送爱人、送老婆','情人节、生日、结婚纪念日','蓝色方形花桶','情人、老婆',2,'2018-03-18','../other/201803182503.jpg*../other/201803182770.jpg*../other/201803183583.jpg'),
 (13,'一心一意','139','11枝玫瑰，寓意一心一意！ 有情之人，天天是节。一句寒暖，一线相喧；一句叮咛，一笺相传；一份相思，一心相盼；一份爱意，一生相恋。',12,'12','../rederimg/201803182314.jpg','../other/201803182726.jpg*../other/201803181294.jpg*../other/201803181089.jpg*../other/201803183989.jpg*../other/201803181583.jpg*../other/201803',11,0,'红玫瑰11枝，粉色(或者紫色）勿忘我0.3扎，栀子叶适量搭配',178,100,'送爱人、送老婆','情人节、生日、结婚纪念日、元旦','内层白色雾面纸，外层牛皮纸,咖啡色花结','情人、老婆',2,'2018-03-18','../other/201803183380.jpg*../other/201803182259.jpg*../other/201803182314.jpg'),
 (14,'浪漫时光','169','红色的玫瑰太过浪漫，就像我爱上你时着迷的模样',12,'12','../rederimg/201803181677.jpg','../other/201803183069.jpg*../other/20180318312.jpg*../other/20180318358.jpg*../other/20180318312.jpg',11,0,'11枝红玫瑰，搭配满天星、栀子叶',203,120,'送情人','情人节、生日、结婚纪念日','高档灰色硬纸外包装，精美条纹丝带','恋人',2,'2018-03-18','../other/201803182798.jpg*../other/20180318171.jpg*../other/201803181677.jpg'),
 (15,'容颜不老','188','愿你的容颜像春天般绚烂',12,'12','../rederimg/20180319858.jpg','../other/201803191910.jpg*../other/201803192305.jpg*../other/201803191367.jpg*../other/20180319221.jpg',12,0,'奶油水果蛋糕，搭配水果，白色巧克力脆',214,100,'生日、纪念日','生日、元旦',' 精致礼盒包装，附送刀、叉、盘、蜡烛','送父母 , 送长辈',1,'2018-03-19','../other/201803192204.jpg*../other/20180319100.jpg*../other/20180319858.jpg'),
 (16,'甜蜜之夏','390','双层奶油水果蛋糕，时令水果装饰，花生脆搭配 淡淡的诗里有绵绵的喜悦，绵绵的喜悦里有我轻轻的祝福',12,'12','../rederimg/20180319513.jpg','../other/20180319835.jpg*../other/201803193609.jpg*../other/201803193970.jpg',12,0,'双层奶油水果蛋糕，时令水果装饰，花生脆搭配',456,120,'送情侣','情人节、生日、结婚纪念日','精致礼盒包装，附送刀、叉、盘、蜡烛','老婆',1,'2018-03-19','../other/201803192149.jpg*../other/201803192532.jpg*../other/20180319513.jpg'),
 (17,'欢乐甜心','366','因为有你，这一天成了一个美丽的日子，人生从此便多了一抹诱人的色彩',3,'3','../rederimg/201803191687.jpg','../other/201803193134.jpg*../other/201803192337.jpg*../other/20180319126.jpg',3,0,'双层奶油水果蛋糕，时令水果装饰，花生脆搭配',427,120,'送情侣 , 送父母','母亲节、生日、父亲节','精致礼盒包装，附送刀、叉、盘、蜡烛','送情侣 , 送父母',1,'2018-03-19','../other/201803191418.jpg*../other/20180319657.jpg*../other/201803191687.jpg'),
 (18,'幸福味蕾 ','208','托白云送去我绵绵不尽的思念，托清风送去我轻轻的祝福',3,'3','../rederimg/2018031959.jpg','../other/201803191387.jpg*../other/20180319603.jpg*../other/20180319882.jpg',3,0,'鲜奶水果蛋糕，各种新鲜水果装饰',238,145,'送情侣','情人节、母亲节',' 精致礼盒包装，附送刀、叉、盘、蜡烛','女朋友、老婆',1,'2018-03-19','../other/201803191676.jpg*../other/201803192562.jpg*../other/2018031959.jpg'),
 (19,'蜜恋时刻 ','378','托白云送去我绵绵不尽的思念，托清风送去我轻轻的祝福',4,'4','../rederimg/201803192851.jpg','../other/201803193566.jpg*../other/201803193738.jpg*../other/20180319924.jpg',4,0,'双层奶油水果蛋糕',442,145,'送情侣','情人节、生日、结婚纪念日','精致礼盒包装，附送刀、叉、盘、蜡烛','女朋友、老婆',1,'2018-03-19','../other/201803193336.jpg*../other/20180319871.jpg*../other/201803192851.jpg'),
 (20,'爱的滋味','205','在你生日的这一天，将快乐的音符，作为礼物送给你',3,'3','../rederimg/201803192443.jpg','../other/201803193678.jpg*../other/201803192479.jpg*../other/20180319216.jpg',3,0,'奶油水果蛋糕，搭配时令水果',234,146,'送情侣','情人节、生日、结婚纪念日、元旦',' 精致礼盒包装，附送刀、叉、盘、蜡烛','送情侣',1,'2018-03-19','../other/201803191718.jpg*../other/20180319991.jpg*../other/201803192443.jpg'),
 (21,'快乐时光','199','难忘是你我纯洁的友情!可贵是永远不变的真情',9,'9','../rederimg/201803193210.jpg','../other/20180319542.jpg*../other/20180319774.jpg*../other/201803191559.jpg*../other/201803191788.jpg',9,0,'鲜奶水果蛋糕，花生脆围绕搭配',227,167,'送朋友','每一天','精致礼盒包装，附送刀、叉、盘','朋友',1,'2018-03-19','../other/2018031952.jpg*../other/201803192592.jpg*../other/201803193210.jpg'),
 (22,'仙鹤献寿','206','古稀之年身体健，劳作不辍精气足',4,'4','../rederimg/20180319437.jpg','../other/201803191983.jpg*../other/201803191436.jpg*../other/201803192081.jpg*../other/20180319786.jpg',4,0,'奶油水果蛋糕',235,120,'送父母 , 送长辈','父亲节、母亲节、元旦','精致礼盒包装','父母、长辈',1,'2018-03-19','../other/20180319802.jpg*../other/201803193694.jpg*../other/20180319437.jpg'),
 (23,'万寿无疆','209','如月之恒，如日之升，如南山之寿，不骞不崩',5,'5','../rederimg/201803191733.jpg','../other/201803193989.jpg*../other/201803193132.jpg*../other/201803193124.jpg*../other/201803192920.jpg',5,0,'  万寿无疆 ',239,123,' 送父母','父亲节、母亲节','精致礼盒包装，附送刀、叉、盘、蜡烛一','父母',1,'2018-03-19','../other/20180319176.jpg*../other/20180319611.jpg*../other/201803191733.jpg'),
 (24,'美之旋律','218','时光的记忆曲线，将美好串联；人生的情感轨迹，将幸福标注',1,'1','../rederimg/201803191346.jpg','../other/201803193583.jpg*../other/20180319401.jpg*../other/201803193642.jpg*../other/201803193491.jpg',1,0,'内奶油水果蛋糕，搭配时令水果、巧克力片',250,145,' 送朋友 , 送情侣','情人节、生日、结婚纪念日、元旦','精致礼盒包装，附送刀、叉、盘、蜡烛','朋友、老婆、女朋友',1,'2018-03-19','../other/201803191844.jpg*../other/201803193771.jpg*../other/201803191346.jpg'),
 (25,'幸福花园','188','感谢上苍在今天给了我一个特别的礼物,就是你。长长的人生旅程，有你相伴是我一生的幸福',4,'4','../rederimg/201803193224.jpg','../other/201803193031.jpg*../other/201803191210.jpg*../other/201803192033.jpg*../other/201803192521.jpg',4,0,'鲜奶水果蛋糕，新鲜水果装饰',214,156,'送情侣','情人节、生日、结婚纪念日',' 精致礼盒包装，附送刀、叉、盘、蜡烛','女朋友、老婆',1,'2018-03-19','../other/20180319519.jpg*../other/201803192473.jpg*../other/201803193224.jpg'),
 (26,'爱之蜜恋','206','今天有了你世界更精彩，今天因为你我觉更幸福',3,'3','../rederimg/201803192684.jpg','../other/20180319668.jpg*../other/201803192005.jpg*../other/201803191286.jpg*../other/201803193590.jpg',3,0,'鲜奶水果心形蛋糕，新鲜水果搭配',235,145,'送情侣','情人节、生日、结婚纪念日','精致礼盒包装，附送刀、叉、盘、蜡烛','女朋友、老婆',1,'2018-03-19','../other/2018031980.jpg*../other/201803193179.jpg*../other/201803192684.jpg'),
 (27,'最真的祝福','386','只有笑容，永远留在你的嘴角',5,'5','../rederimg/201803193113.jpg','../other/201803193896.jpg*../other/20180319520.jpg*../other/201803193882.jpg',5,0,'双层奶油水果',451,145,'送长辈、父母','父亲节、母亲节、元旦',' 精致礼盒包装，附送刀、叉、盘、蜡烛','父母、长辈',1,'2018-03-19','../other/201803191860.jpg*../other/201803191729.jpg*../other/201803193113.jpg'),
 (28,'满口生香','208','年年岁岁花相似，岁岁年年人不同',5,'5','../rederimg/201803192599.jpg','../other/201803192652.jpg*../other/201803193457.jpg*../other/201803193422.jpg*../other/2018031942.jpg',5,0,'奶油巧克力蛋糕',238,200,'送朋友 , 送情侣','情人节、生日、结婚纪念日',' 精致礼盒包装，附送刀、叉、盘、蜡烛','朋友、老婆、女朋友',1,'2018-03-19','../other/201803191480.jpg*../other/201803192568.jpg*../other/201803192599.jpg'),
 (29,'初恋的甜蜜','385','长长的人生旅程，有你相伴是我一生的幸福。祝你生日快乐',6,'6','../rederimg/201803192388.jpg','../other/201803192365.jpg*../other/201803192261.jpg*../other/20180319626.jpg',6,0,'双层奶油水果蛋糕，时令水果装饰，巧克力片搭配',450,120,'送情侣','情人节、生日、结婚纪念日、元旦',' 精致礼盒包装，附送刀、叉、盘、蜡烛','女朋友、老婆',1,'2018-03-19','../other/201803191803.jpg*../other/201803193399.jpg*../other/201803192388.jpg'),
 (30,'在水一方','309','绿草苍苍白雾茫茫，有位佳人在水一方',12,'12','../rederimg/201803302699.jpg','../other/201803303665.jpg*../other/201803302694.jpg*../other/20180330732.jpg*../other/2018033031.jpg*../other/201803301054.jpg*../other/201803301',19,0,'雪山玫瑰19枝，绿色小雏菊7枝，白色相思梅5枝，黄莺1扎，尤加利叶0.5扎，栀子叶0.5扎',396,120,'送老婆','情人节、生日、结婚纪念日、元旦','银灰色方形花筒','老婆、女朋友',2,'2018-03-30','../other/201803303374.jpg*../other/20180330621.jpg*../other/201803302699.jpg'),
 (31,'忘情巴黎','298','只想和你忘掉一切烦恼，尽情沉醉在最浪漫的气氛中。',10,'12','../rederimg/201803302746.jpg','../other/201803302324.jpg*../other/201803302790.jpg*../other/201803303319.jpg*../other/20180330857.jpg*../other/201803301656.jpg*../other/201803302179.jpg*../other/201803303881.jpg*../other/20180330366.jpg*../other/201803301417.jpg',33,1,'33枝红玫瑰，石竹梅围绕',383,120,'送爱人、送老婆','情人节、生日、结婚纪念日','黑色条纹纸，红色缎带花结','老婆、女朋友',2,'2018-03-30','../other/20180330864.jpg*../other/201803301999.jpg*../other/201803302746.jpg');
/*!40000 ALTER TABLE `goods` ENABLE KEYS */;


--
-- Definition of table `kind`
--

DROP TABLE IF EXISTS `kind`;
CREATE TABLE `kind` (
  `kind_id` int(50) unsigned NOT NULL auto_increment COMMENT '种类编号',
  `kind_name` varchar(45) NOT NULL COMMENT '种类名称',
  PRIMARY KEY  (`kind_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='种类表';

--
-- Dumping data for table `kind`
--

/*!40000 ALTER TABLE `kind` DISABLE KEYS */;
INSERT INTO `kind` (`kind_id`,`kind_name`) VALUES 
 (1,'蛋糕'),
 (2,'鲜花'),
 (3,'礼品');
/*!40000 ALTER TABLE `kind` ENABLE KEYS */;


--
-- Definition of table `know`
--

DROP TABLE IF EXISTS `know`;
CREATE TABLE `know` (
  `hua_id` int(50) unsigned NOT NULL auto_increment COMMENT '编号',
  `hua_title` varchar(60) NOT NULL COMMENT '标题',
  `hua_content` varchar(100) NOT NULL COMMENT '内容',
  `hua_time` date NOT NULL COMMENT '发表时间',
  `admin_id` int(50) unsigned NOT NULL COMMENT '管理员编号',
  PRIMARY KEY  (`hua_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='花卉知识表';

--
-- Dumping data for table `know`
--

/*!40000 ALTER TABLE `know` DISABLE KEYS */;
/*!40000 ALTER TABLE `know` ENABLE KEYS */;


--
-- Definition of table `ly`
--

DROP TABLE IF EXISTS `ly`;
CREATE TABLE `ly` (
  `ly_id` int(50) unsigned NOT NULL auto_increment COMMENT '留言编号',
  `title` varchar(45) NOT NULL COMMENT '留言标题',
  `content` varchar(100) NOT NULL COMMENT '留言内容',
  `ip` varchar(45) NOT NULL COMMENT 'ip地址',
  `ly_time` varchar(45) NOT NULL COMMENT '留言时间',
  PRIMARY KEY  (`ly_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='反馈表';

--
-- Dumping data for table `ly`
--

/*!40000 ALTER TABLE `ly` DISABLE KEYS */;
/*!40000 ALTER TABLE `ly` ENABLE KEYS */;


--
-- Definition of table `order_detail`
--

DROP TABLE IF EXISTS `order_detail`;
CREATE TABLE `order_detail` (
  `id` int(30) unsigned NOT NULL auto_increment COMMENT '编号',
  `book_id` int(50) unsigned NOT NULL COMMENT '订单编号',
  `good_id` int(45) unsigned NOT NULL COMMENT '商品编号',
  `name` varchar(45) NOT NULL COMMENT '商品名称',
  `num` int(30) unsigned NOT NULL COMMENT '购买数量',
  `price` int(30) unsigned NOT NULL COMMENT '单价',
  PRIMARY KEY  (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

--
-- Dumping data for table `order_detail`
--

/*!40000 ALTER TABLE `order_detail` DISABLE KEYS */;
INSERT INTO `order_detail` (`id`,`book_id`,`good_id`,`name`,`num`,`price`) VALUES 
 (5,16,31,'忘情巴黎',3,298),
 (6,17,31,'忘情巴黎',2,298);
/*!40000 ALTER TABLE `order_detail` ENABLE KEYS */;


--
-- Definition of table `storegood`
--

DROP TABLE IF EXISTS `storegood`;
CREATE TABLE `storegood` (
  `store_id` int(45) unsigned NOT NULL auto_increment COMMENT '收藏编号',
  `good_id` int(45) unsigned NOT NULL COMMENT '商品编号',
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `store_time` date NOT NULL COMMENT '收藏时间',
  PRIMARY KEY  (`store_id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COMMENT='收藏表';

--
-- Dumping data for table `storegood`
--

/*!40000 ALTER TABLE `storegood` DISABLE KEYS */;
INSERT INTO `storegood` (`store_id`,`good_id`,`user_id`,`store_time`) VALUES 
 (1,30,2018102,'2018-03-30'),
 (2,30,2018102,'2018-03-30'),
 (3,30,2018102,'2018-03-30'),
 (4,31,2018102,'2018-03-31'),
 (5,12,2018102,'2018-04-01'),
 (6,11,2018102,'2018-04-01'),
 (7,5,2018102,'2018-04-01'),
 (8,6,2018102,'2018-04-01'),
 (9,13,2018102,'2018-04-09'),
 (10,9,2018102,'2018-04-30');
/*!40000 ALTER TABLE `storegood` ENABLE KEYS */;


--
-- Definition of table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(50) unsigned NOT NULL COMMENT '用户编号',
  `user_name` varchar(50) NOT NULL COMMENT '用户名',
  `user_pass` varchar(45) NOT NULL COMMENT '密码',
  `realname` varchar(45) NOT NULL COMMENT '真实姓名',
  `sex` varchar(45) NOT NULL COMMENT '性别',
  `user_tel` varchar(45) NOT NULL COMMENT '手机号码',
  `user_time` date NOT NULL COMMENT '注册时间',
  `email` varchar(50) NOT NULL COMMENT '邮箱',
  `ip` varchar(45) NOT NULL COMMENT 'ip地址',
  PRIMARY KEY  (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='用户表';

--
-- Dumping data for table `user`
--

/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` (`user_id`,`user_name`,`user_pass`,`realname`,`sex`,`user_tel`,`user_time`,`email`,`ip`) VALUES 
 (0,'232','','11','男','13132680639','2018-05-03','','127.0.0.1'),
 (1234,'324234','234324','324234','男','13132680639','2018-04-29','','127.0.0.1'),
 (2017101,'huangmeili','123456','黄梅丽','女','13132680639','2018-03-28','',''),
 (2018102,'黄梅丽','123456','黄梅丽','女','13132680639','2018-03-16','',''),
 (2018103,'123456','123456','123456','女','13132680639','2018-03-31','',''),
 (2018104,'123456','123456','123456','女','13132680639','2018-03-31','',''),
 (2018105,'123456','123456','123456','女','13132680639','2018-03-31','','127.0.0.1'),
 (2018106,'123456','123456','黄梅丽','女','13132680639','2018-03-31','','127.0.0.1'),
 (2018107,'123456','123456','黄梅丽','女','13132680639','2018-03-31','','127.0.0.1'),
 (2018108,'1323','123456','1323','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018109,'黄梅丽','123456','黄梅丽','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018110,'黄梅丽','123456','黄梅丽','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018111,'黄梅丽','123456','黄梅丽','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018112,'黄梅丽','123456','黄梅丽','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018113,'刘杜','123456','刘杜','','13132680639','2018-04-08','1902208032@qq.com','127.0.0.1'),
 (2018114,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018115,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018116,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018117,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018118,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018119,'刘杜','123456','刘杜','','13132680639','2018-04-09','1902208032@qq.com','127.0.0.1'),
 (2018120,'刘杜','123456','刘杜','','13132680639','2018-04-10','1902208032@qq.com','127.0.0.1'),
 (2018428,'黄梅丽','123456','黄梅丽','女','13132680639','2018-04-29','','127.0.0.1'),
 (5201314,'324234','234324','324234','男','13132680639','2018-04-29','','127.0.0.1');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;




/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
