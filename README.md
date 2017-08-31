# whatip
A light php API to get your IP, and more.

# 说明
https://www.v2ex.com/t/386624
有业务需要本地客户端看外网 IP，就做了一个小轮子（后面才看到 https://ip.sb ，但是做都做了 233，就当记录一下吧)

- 地址：
    - whatip.ga
    - whatip.ml
    - whatip.cf
地址的作用都是等同的，区别就是 ga 和 ml 都强制 https，cf 没有

- 功能

- IP Address In Plain Text
    - 直接访问即可，或者命令行 `curl https://whatip.ga`
- `/json` 获取 JSON 格式

- 顺便做了一点其他（没卵用）的……

- `/ping`
    - 返回 `pong`
- `/base64/{content}` or `/?base64={content}`
    - 转换 base64
    - 解密 `/decode?base64={content}` or `/base64/{content}/decode`
- `/generate_204` or `/204`
    - header 204 no content
- `/to/{base64}`    - 
    - 发送 302 跳转到 base64 编码后的地址，等同 -> `Location: //{Decoded Content}`
    - `/to/{base64}/http` 和 `/to/{base64}/https` 给 `{Decoded Content}` 加上前缀
    - `/to/{base64}/origin` 等同 -> `Location: {Decoded Content}`

部署在 Hostker 上面，速度还是不错的，有比较冷门需求的就拿去玩玩咯
没有留任何记录（懒），Apache2 的访问记录除外（这个也不会去看的）
还不支持 IPV6，找时间会加上

# 简化成一个文件

把`Class`里面的东西放进Index就好了……
