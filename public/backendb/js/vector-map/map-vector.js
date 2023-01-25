'use strict';
! function (maps) {
    "use strict";
    var b = function () {};
    b.prototype.init = function () {
        maps("#world-map").vectorMap({
            map: "world_mill_en",
            scaleColors: ["#2196F3", "#1B8BF9"],
            normalizeFunction: "polynomial",
            hoverOpacity: .7,
            hoverColor: !1,

            regionStyle: {
                initial: {
                    fill: "#4aa4d9"
                }
            },
            backgroundColor: "transparent",
        })
    }, maps.VectorMap = new b, maps.VectorMap.Constructor = b
}(window.jQuery),
function (maps) {
    "use strict";
    maps.VectorMap.init()
}(window.jQuery);