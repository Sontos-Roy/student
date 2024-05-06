"use strict";
var KTSigninTwoFactor = (function () {
    var t, e;
    return {
        init: function () {
            var n, i, o, u, r, c, otp;
            (t = document.querySelector("#ajax_form")),
                (n = t.querySelector("[name=code_1]")),
                (i = t.querySelector("[name=code_2]")),
                (o = t.querySelector("[name=code_3]")),
                (u = t.querySelector("[name=code_4]")),
                (r = t.querySelector("[name=code_5]")),
                (c = t.querySelector("[name=code_6]")),
                (otp = t.querySelector("[name=otp]")),
                n.focus(),
                n.addEventListener("keyup", function () {
                    1 === this.value.length && i.focus();
                }),
                i.addEventListener("keyup", function () {
                    1 === this.value.length && o.focus();
                }),
                o.addEventListener("keyup", function () {
                    1 === this.value.length && u.focus();
                }),
                u.addEventListener("keyup", function () {
                    1 === this.value.length && r.focus();
                }),
                r.addEventListener("keyup", function () {
                    1 === this.value.length && c.focus();
                }),
                c.addEventListener("keyup", function () {
                    1 === this.value.length && c.blur();
                    var d = n.value + i.value + o.value + u.value + r.value + c.value;
                    otp.value = d;
                });

        },
    };
})();
KTUtil.onDOMContentLoaded(function () {
    KTSigninTwoFactor.init();
});
