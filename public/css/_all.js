import React, {StyleSheet, Dimensions, PixelRatio} from "react-native";
const {width, height, scale} = Dimensions.get("window"),
    vw = width / 100,
    vh = height / 100,
    vmin = Math.min(vw, vh),
    vmax = Math.max(vw, vh);

export default StyleSheet.create({
    "icheckbox_square": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(square.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(square.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_squarehover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_squarechecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_squaredisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_squarecheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_squarehover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_squarechecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_squaredisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_squarecheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-red": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(red.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-red": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(red.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-redhover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-redchecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-reddisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-redcheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-redhover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-redchecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-reddisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-redcheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-green": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(green.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-green": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(green.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-greenhover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-greenchecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-greendisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-greencheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-greenhover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-greenchecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-greendisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-greencheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-blue": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-blue": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-bluehover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-bluechecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-bluedisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-bluecheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-bluehover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-bluechecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-bluedisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-bluecheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-aero": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(aero.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-aero": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(aero.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-aerohover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-aerochecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-aerodisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-aerocheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-aerohover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-aerochecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-aerodisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-aerocheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-grey": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(grey.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-grey": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(grey.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-greyhover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-greychecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-greydisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-greycheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-greyhover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-greychecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-greydisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-greycheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-orange": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(orange.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-orange": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(orange.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-orangehover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-orangechecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-orangedisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-orangecheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-orangehover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-orangechecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-orangedisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-orangecheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-yellow": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(yellow.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-yellow": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(yellow.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-yellowhover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-yellowchecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-yellowdisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-yellowcheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-yellowhover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-yellowchecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-yellowdisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-yellowcheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-pink": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(pink.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-pink": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(pink.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-pinkhover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-pinkchecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-pinkdisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-pinkcheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-pinkhover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-pinkchecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-pinkdisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-pinkcheckeddisabled": {
        "backgroundPosition": "-216px 0"
    },
    "icheckbox_square-purple": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(purple.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "0 0"
    },
    "iradio_square-purple": {
        "display": "inline-block",
        "Display": "inline",
        "verticalAlign": "middle",
        "marginTop": 0,
        "marginRight": 0,
        "marginBottom": 0,
        "marginLeft": 0,
        "paddingTop": 0,
        "paddingRight": 0,
        "paddingBottom": 0,
        "paddingLeft": 0,
        "width": 22,
        "height": 22,
        "background": "url(purple.png) no-repeat",
        "border": "none",
        "cursor": "pointer",
        "backgroundPosition": "-120px 0"
    },
    "icheckbox_square-purplehover": {
        "backgroundPosition": "-24px 0"
    },
    "icheckbox_square-purplechecked": {
        "backgroundPosition": "-48px 0"
    },
    "icheckbox_square-purpledisabled": {
        "backgroundPosition": "-72px 0",
        "cursor": "default"
    },
    "icheckbox_square-purplecheckeddisabled": {
        "backgroundPosition": "-96px 0"
    },
    "iradio_square-purplehover": {
        "backgroundPosition": "-144px 0"
    },
    "iradio_square-purplechecked": {
        "backgroundPosition": "-168px 0"
    },
    "iradio_square-purpledisabled": {
        "backgroundPosition": "-192px 0",
        "cursor": "default"
    },
    "iradio_square-purplecheckeddisabled": {
        "backgroundPosition": "-216px 0"
    }
});