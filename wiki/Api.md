# API

## <获取座位(电影票)情况>

> url : /getTickets
- input :

```javascript
{
    movieId: int,           // 电影id
    feildId: int,           // 场次id
    startTime: string,      // 开始时间
}
```

- output :

```javascript
{
    seatList: []Seat,         // 座位列表
}
```