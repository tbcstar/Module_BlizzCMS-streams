# Streams | Module for BlizzCMS!

BlizzCms 模块，允许您从 CMS 观看实时 Twitch 和聊天。
BlizzCMS version 2.0.0+

# 特征
- 在您的网站上插入播放器和 twitch 聊天
- 添加频道的模块（每个帐户 1 个频道，必须注册才能将其添加到列表中）
# 安装
- 在 BlizzCms 数据库中运行文件 (SQL/Streams.sql)
- 复制 `Module_BlizzCMS-streams/application/modules/streams` 文件夹到 `BlizzCMS/application/modules` 目录下。
- Add the following to `application/config/routes.php` at the end of the file:

```
/*Streams*/
$route[$lang.'/streams'] = 'streams/index';
$route[$lang.'/streams/create'] = 'streams/create';
```

- Opens the application/modules/streams/views/index.php and on lines 11 and 21 replaces "parent=theegn.com&parent=www.theegn.com" for your own domain (This is required by twitch)

```
Example:
Before line 11: parent=theegn.com&parent=www.theegn.com
--
Before line 21: chat?parent=theegn.com&parent=www.theegn.com
```
- See it in action here `https://www.theegn.com/en/streams`
# Screenshots
[![Captura1](https://raw.githubusercontent.com/AsmodeosNetworkCO/Module_BlizzCMS-Streams/master/screenshots/screenshot-1.JPG "Captura1")]
[![Captura2](https://raw.githubusercontent.com/AsmodeosNetworkCO/Module_BlizzCMS-Streams/master/screenshots/screenshot-2.JPG "Captura2")]
[![Captura3](https://raw.githubusercontent.com/AsmodeosNetworkCO/Module_BlizzCMS-Streams/master/screenshots/screenshot-3.JPG "Captura3")]
[![Captura4](https://raw.githubusercontent.com/AsmodeosNetworkCO/Module_BlizzCMS-Streams/master/screenshots/screenshot-4.JPG "Captura4")]
[![Captura5](https://raw.githubusercontent.com/AsmodeosNetworkCO/Module_BlizzCMS-Streams/master/screenshots/screenshot-5.JPG "Captura5")]

# Thanks
- [WoW CMS Developers](https://wow-cms.com "BlizzCMS")
- [WoW CMS Discord Members](https://discord.gg/vZG9vpS "WoW CMS Discord Members")
- [Empire Gaming](https://www.theegn.com/ "Empire Gaming")
- [AsmodeosNetwork - No longer maintained](https://github.com/AsmodeosNetworkCO/Module_BlizzCMS-streams "AsmodeosNetwork - No longer maintained")
