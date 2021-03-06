# SeeWhat

## 一、[接口](https://github.com/524-f4/SeeWhat/wiki)规范：

- 一个接口由 *标题(title)*, *路径(url)*, *输入(input)*, *输出(outpput)* 构成。其中 *输入(input)*, *输出(outpput)* 由接口字段构成。

- 接口按照示例书写，接口字段必须规定数据结构。接口字段名必须是由小写字母开头的驼峰式命名。

- 基础数据结构包括 `int` , `bool`, `float`, `string` .

- 数组由数据结构前加上 `[]` 表示，如一个 `[]string` 则表示一个字符型数组。

- “数据结构” 页面记录自定义数据结构，由基础数据结构构成，自定义数据结构也可在其前加上 `[]` 构成数组形式，如 `[]Authority` .

- 自定义数据结构首字母必须大写.

## 二、依赖环境：

- PHP版本: 7.2

```javascript
// 项目依赖
"require": {
    "zendframework/zend-diactoros": "^1.8",
    "league/route": "^4.0",
    "illuminate/database": "^5.7"
}
```

- Nginx版本: 1.14

- MySql版本: 5.7

- Redis版本: 4.0
