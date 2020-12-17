～～～公司要做一个淘宝客的项目，需要接入大淘客，官方SDK用的不是很顺手，自己封装了一个～～～
## 下载方式
composer
```composer
composer require lyb/dataoke
```
git
```git
git clone git@github.com:Lyb-coder/dataoke.git
```

## 获取接口信息
```php
include '../../../autoload.php';
use \DaTaoKe\Requests\BindSteategyClass;

/**
 * 获取接口信息（终端输出）
 */
function getApiInfo(){
    //获取所有接口信息
    //BindSteategyClass::GetAllSteategy();
    //获取指定接口信息
    //BindSteategyClass::GetAllSteategy("活动商品");
}
getApiInfo();

```
![ 获取接口信息并生成文档（终端输出）](https://i.loli.net/2020/09/11/joLfJCqaQGAURnT.jpg)
## 获取接口数据信息
```php
include '../../../autoload.php';
use \DaTaoKe\Client\DtkClient;
$obj = new DtkClient(
    "XXXXXXXXXX",
    "XXXXXXXXXXXXXXXXXXXX",
    'array'//有array,object,json三种类型
);
$params = array_merge((array)$_GET,(array)$_POST);
$obj->setSteategyObj("GetGoodsList",$params);
print_r($obj->performRequests());

##数据太多就不截图了，自己看吧，其他接口都是一样的方式
```

