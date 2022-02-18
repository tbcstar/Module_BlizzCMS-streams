# Streams | Module for BlizzCMS!

Module for BlizzCms that allows you to watch live Twitch and chat from the CMS.

# Features
- Player and twitch chat inserted on your website
- Module to add channels (1 channel per account and must be registered to add it to the list)
# Installation
- Run the file (SQL/Streams.sql) in the BlizzCms database
- Copy in your module folder The `Application/Modules/Streams` folder
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
- [AsmodeosNetwork](https://github.com/AsmodeosNetworkCO/Module_BlizzCMS-streams "AsmodeosNetwork(No longer maintained)")
