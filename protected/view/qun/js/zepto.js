/* Zepto v1.1.4 - zepto event ajax form ie - zeptojs.com/license key:<{$tpl_token}> */
var Zepto = function() {
        function L(t) {
            return null == t ? String(t) : j[S.call(t)] || "object"
        }
        function Z(t) {
            return "function" == L(t)
        }
        function $(t) {
            return null != t && t == t.window
        }
        function _(t) {
            return null != t && t.nodeType == t.DOCUMENT_NODE
        }
        function D(t) {
            return "object" == L(t)
        }
        function R(t) {
            return D(t) && !$(t) && Object.getPrototypeOf(t) == Object.prototype
        }
        function M(t) {
            return "number" == typeof t.length
        }
        function k(t) {
            return s.call(t, function(t) {
                return null != t
            })
        }
        function z(t) {
            return t.length > 0 ? n.fn.concat.apply([], t) : t
        }
        function F(t) {
            return t.replace(/::/g, "/").replace(/([A-Z]+)([A-Z][a-z])/g, "$1_$2").replace(/([a-z\d])([A-Z])/g, "$1_$2").replace(/_/g, "-").toLowerCase()
        }
        function q(t) {
            return t in f ? f[t] : f[t] = new RegExp("(^|\\s)" + t + "(\\s|$)")
        }
        function H(t, e) {
            return "number" != typeof e || c[F(t)] ? e : e + "px"
        }
        function I(t) {
            var e, n;
            return u[t] || (e = a.createElement(t), a.body.appendChild(e), n = getComputedStyle(e, "").getPropertyValue("display"), e.parentNode.removeChild(e), "none" == n && (n = "block"), u[t] = n), u[t]
        }
        function V(t) {
            return "children" in t ? o.call(t.children) : n.map(t.childNodes, function(t) {
                return 1 == t.nodeType ? t : void 0
            })
        }
        function B(n, i, r) {
            for (e in i) r && (R(i[e]) || A(i[e])) ? (R(i[e]) && !R(n[e]) && (n[e] = {}), A(i[e]) && !A(n[e]) && (n[e] = []), B(n[e], i[e], r)) : i[e] !== t && (n[e] = i[e])
        }
        function U(t, e) {
            return null == e ? n(t) : n(t).filter(e)
        }
        function J(t, e, n, i) {
            return Z(e) ? e.call(t, n, i) : e
        }
        function X(t, e, n) {
            null == n ? t.removeAttribute(e) : t.setAttribute(e, n)
        }
        function W(e, n) {
            var i = e.className,
                r = i && i.baseVal !== t;
            return n === t ? r ? i.baseVal : i : void(r ? i.baseVal = n : e.className = n)
        }
        function Y(t) {
            var e;
            try {
                return t ? "true" == t || ("false" == t ? !1 : "null" == t ? null : /^0/.test(t) || isNaN(e = Number(t)) ? /^[\[\{]/.test(t) ? n.parseJSON(t) : t : e) : t
            } catch (i) {
                return t
            }
        }
        function G(t, e) {
            e(t);
            for (var n = 0, i = t.childNodes.length; i > n; n++) G(t.childNodes[n], e)
        }
        var t, e, n, i, C, N, r = [],
            o = r.slice,
            s = r.filter,
            a = window.document,
            u = {},
            f = {},
            c = {
                "column-count": 1,
                columns: 1,
                "font-weight": 1,
                "line-height": 1,
                opacity: 1,
                "z-index": 1,
                zoom: 1
            },
            l = /^\s*<(\w+|!)[^>]*>/,
            h = /^<(\w+)\s*\/?>(?:<\/\1>|)$/,
            p = /<(?!area|br|col|embed|hr|img|input|link|meta|param)(([\w:]+)[^>]*)\/>/gi,
            d = /^(?:body|html)$/i,
            m = /([A-Z])/g,
            g = ["val", "css", "html", "text", "data", "width", "height", "offset"],
            v = ["after", "prepend", "before", "append"],
            y = a.createElement("table"),
            x = a.createElement("tr"),
            b = {
                tr: a.createElement("tbody"),
                tbody: y,
                thead: y,
                tfoot: y,
                td: x,
                th: x,
                "*": a.createElement("div")
            },
            w = /complete|loaded|interactive/,
            E = /^[\w-]*$/,
            j = {},
            S = j.toString,
            T = {},
            O = a.createElement("div"),
            P = {
                tabindex: "tabIndex",
                readonly: "readOnly",
                "for": "htmlFor",
                "class": "className",
                maxlength: "maxLength",
                cellspacing: "cellSpacing",
                cellpadding: "cellPadding",
                rowspan: "rowSpan",
                colspan: "colSpan",
                usemap: "useMap",
                frameborder: "frameBorder",
                contenteditable: "contentEditable"
            },
            A = Array.isArray ||
        function(t) {
            return t instanceof Array
        };
        return T.matches = function(t, e) {
            if (!e || !t || 1 !== t.nodeType) return !1;
            var n = t.webkitMatchesSelector || t.mozMatchesSelector || t.oMatchesSelector || t.matchesSelector;
            if (n) return n.call(t, e);
            var i, r = t.parentNode,
                o = !r;
            return o && (r = O).appendChild(t), i = ~T.qsa(r, e).indexOf(t), o && O.removeChild(t), i
        }, C = function(t) {
            return t.replace(/-+(.)?/g, function(t, e) {
                return e ? e.toUpperCase() : ""
            })
        }, N = function(t) {
            return s.call(t, function(e, n) {
                return t.indexOf(e) == n
            })
        }, T.fragment = function(e, i, r) {
            var s, u, f;
            return h.test(e) && (s = n(a.createElement(RegExp.$1))), s || (e.replace && (e = e.replace(p, "<$1></$2>")), i === t && (i = l.test(e) && RegExp.$1), i in b || (i = "*"), f = b[i], f.innerHTML = "" + e, s = n.each(o.call(f.childNodes), function() {
                f.removeChild(this)
            })), R(r) && (u = n(s), n.each(r, function(t, e) {
                g.indexOf(t) > -1 ? u[t](e) : u.attr(t, e)
            })), s
        }, T.Z = function(t, e) {
            return t = t || [], t.__proto__ = n.fn, t.selector = e || "", t
        }, T.isZ = function(t) {
            return t instanceof T.Z
        }, T.init = function(e, i) {
            var r;
            if (!e) return T.Z();
            if ("string" == typeof e) if (e = e.trim(), "<" == e[0] && l.test(e)) r = T.fragment(e, RegExp.$1, i), e = null;
            else {
                if (i !== t) return n(i).find(e);
                r = T.qsa(a, e)
            } else {
                if (Z(e)) return n(a).ready(e);
                if (T.isZ(e)) return e;
                if (A(e)) r = k(e);
                else if (D(e)) r = [e], e = null;
                else if (l.test(e)) r = T.fragment(e.trim(), RegExp.$1, i), e = null;
                else {
                    if (i !== t) return n(i).find(e);
                    r = T.qsa(a, e)
                }
            }
            return T.Z(r, e)
        }, n = function(t, e) {
            return T.init(t, e)
        }, n.extend = function(t) {
            var e, n = o.call(arguments, 1);
            return "boolean" == typeof t && (e = t, t = n.shift()), n.forEach(function(n) {
                B(t, n, e)
            }), t
        }, T.qsa = function(t, e) {
            var n, i = "#" == e[0],
                r = !i && "." == e[0],
                s = i || r ? e.slice(1) : e,
                a = E.test(s);
            return _(t) && a && i ? (n = t.getElementById(s)) ? [n] : [] : 1 !== t.nodeType && 9 !== t.nodeType ? [] : o.call(a && !i ? r ? t.getElementsByClassName(s) : t.getElementsByTagName(e) : t.querySelectorAll(e))
        }, n.contains = a.documentElement.contains ?
        function(t, e) {
            return t !== e && t.contains(e)
        } : function(t, e) {
            for (; e && (e = e.parentNode);) if (e === t) return !0;
            return !1
        }, n.type = L, n.isFunction = Z, n.isWindow = $, n.isArray = A, n.isPlainObject = R, n.isEmptyObject = function(t) {
            var e;
            for (e in t) return !1;
            return !0
        }, n.inArray = function(t, e, n) {
            return r.indexOf.call(e, t, n)
        }, n.camelCase = C, n.trim = function(t) {
            return null == t ? "" : String.prototype.trim.call(t)
        }, n.uuid = 0, n.support = {}, n.expr = {}, n.map = function(t, e) {
            var n, r, o, i = [];
            if (M(t)) for (r = 0; r < t.length; r++) n = e(t[r], r), null != n && i.push(n);
            else for (o in t) n = e(t[o], o), null != n && i.push(n);
            return z(i)
        }, n.each = function(t, e) {
            var n, i;
            if (M(t)) {
                for (n = 0; n < t.length; n++) if (e.call(t[n], n, t[n]) === !1) return t
            } else for (i in t) if (e.call(t[i], i, t[i]) === !1) return t;
            return t
        }, n.grep = function(t, e) {
            return s.call(t, e)
        }, window.JSON && (n.parseJSON = JSON.parse), n.each("Boolean Number String Function Array Date RegExp Object Error".split(" "), function(t, e) {
            j["[object " + e + "]"] = e.toLowerCase()
        }), n.fn = {
            forEach: r.forEach,
            reduce: r.reduce,
            push: r.push,
            sort: r.sort,
            indexOf: r.indexOf,
            concat: r.concat,
            map: function(t) {
                return n(n.map(this, function(e, n) {
                    return t.call(e, n, e)
                }))
            },
            slice: function() {
                return n(o.apply(this, arguments))
            },
            ready: function(t) {
                return w.test(a.readyState) && a.body ? t(n) : a.addEventListener("DOMContentLoaded", function() {
                    t(n)
                }, !1), this
            },
            get: function(e) {
                return e === t ? o.call(this) : this[e >= 0 ? e : e + this.length]
            },
            toArray: function() {
                return this.get()
            },
            size: function() {
                return this.length
            },
            remove: function() {
                return this.each(function() {
                    null != this.parentNode && this.parentNode.removeChild(this)
                })
            },
            each: function(t) {
                return r.every.call(this, function(e, n) {
                    return t.call(e, n, e) !== !1
                }), this
            },
            filter: function(t) {
                return Z(t) ? this.not(this.not(t)) : n(s.call(this, function(e) {
                    return T.matches(e, t)
                }))
            },
            add: function(t, e) {
                return n(N(this.concat(n(t, e))))
            },
            is: function(t) {
                return this.length > 0 && T.matches(this[0], t)
            },
            not: function(e) {
                var i = [];
                if (Z(e) && e.call !== t) this.each(function(t) {
                    e.call(this, t) || i.push(this)
                });
                else {
                    var r = "string" == typeof e ? this.filter(e) : M(e) && Z(e.item) ? o.call(e) : n(e);
                    this.forEach(function(t) {
                        r.indexOf(t) < 0 && i.push(t)
                    })
                }
                return n(i)
            },
            has: function(t) {
                return this.filter(function() {
                    return D(t) ? n.contains(this, t) : n(this).find(t).size()
                })
            },
            eq: function(t) {
                return -1 === t ? this.slice(t) : this.slice(t, +t + 1)
            },
            first: function() {
                var t = this[0];
                return t && !D(t) ? t : n(t)
            },
            last: function() {
                var t = this[this.length - 1];
                return t && !D(t) ? t : n(t)
            },
            find: function(t) {
                var e, i = this;
                return e = t ? "object" == typeof t ? n(t).filter(function() {
                    var t = this;
                    return r.some.call(i, function(e) {
                        return n.contains(e, t)
                    })
                }) : 1 == this.length ? n(T.qsa(this[0], t)) : this.map(function() {
                    return T.qsa(this, t)
                }) : []
            },
            closest: function(t, e) {
                var i = this[0],
                    r = !1;
                for ("object" == typeof t && (r = n(t)); i && !(r ? r.indexOf(i) >= 0 : T.matches(i, t));) i = i !== e && !_(i) && i.parentNode;
                return n(i)
            },
            parents: function(t) {
                for (var e = [], i = this; i.length > 0;) i = n.map(i, function(t) {
                    return (t = t.parentNode) && !_(t) && e.indexOf(t) < 0 ? (e.push(t), t) : void 0
                });
                return U(e, t)
            },
            parent: function(t) {
                return U(N(this.pluck("parentNode")), t)
            },
            children: function(t) {
                return U(this.map(function() {
                    return V(this)
                }), t)
            },
            contents: function() {
                return this.map(function() {
                    return o.call(this.childNodes)
                })
            },
            siblings: function(t) {
                return U(this.map(function(t, e) {
                    return s.call(V(e.parentNode), function(t) {
                        return t !== e
                    })
                }), t)
            },
            empty: function() {
                return this.each(function() {
                    this.innerHTML = ""
                })
            },
            pluck: function(t) {
                return n.map(this, function(e) {
                    return e[t]
                })
            },
            show: function() {
                return this.each(function() {
                    "none" == this.style.display && (this.style.display = ""), "none" == getComputedStyle(this, "").getPropertyValue("display") && (this.style.display = I(this.nodeName))
                })
            },
            replaceWith: function(t) {
                return this.before(t).remove()
            },
            wrap: function(t) {
                var e = Z(t);
                if (this[0] && !e) var i = n(t).get(0),
                    r = i.parentNode || this.length > 1;
                return this.each(function(o) {
                    n(this).wrapAll(e ? t.call(this, o) : r ? i.cloneNode(!0) : i)
                })
            },
            wrapAll: function(t) {
                if (this[0]) {
                    n(this[0]).before(t = n(t));
                    for (var e;
                    (e = t.children()).length;) t = e.first();
                    n(t).append(this)
                }
                return this
            },
            wrapInner: function(t) {
                var e = Z(t);
                return this.each(function(i) {
                    var r = n(this),
                        o = r.contents(),
                        s = e ? t.call(this, i) : t;
                    o.length ? o.wrapAll(s) : r.append(s)
                })
            },
            unwrap: function() {
                return this.parent().each(function() {
                    n(this).replaceWith(n(this).children())
                }), this
            },
            clone: function() {
                return this.map(function() {
                    return this.cloneNode(!0)
                })
            },
            hide: function() {
                return this.css("display", "none")
            },
            toggle: function(e) {
                return this.each(function() {
                    var i = n(this);
                    (e === t ? "none" == i.css("display") : e) ? i.show() : i.hide()
                })
            },
            prev: function(t) {
                return n(this.pluck("previousElementSibling")).filter(t || "*")
            },
            next: function(t) {
                return n(this.pluck("nextElementSibling")).filter(t || "*")
            },
            html: function(t) {
                return 0 in arguments ? this.each(function(e) {
                    var i = this.innerHTML;
                    n(this).empty().append(J(this, t, e, i))
                }) : 0 in this ? this[0].innerHTML : null
            },
            text: function(t) {
                return 0 in arguments ? this.each(function(e) {
                    var n = J(this, t, e, this.textContent);
                    this.textContent = null == n ? "" : "" + n
                }) : 0 in this ? this[0].textContent : null
            },
            attr: function(n, i) {
                var r;
                return "string" != typeof n || 1 in arguments ? this.each(function(t) {
                    if (1 === this.nodeType) if (D(n)) for (e in n) X(this, e, n[e]);
                    else X(this, n, J(this, i, t, this.getAttribute(n)))
                }) : this.length && 1 === this[0].nodeType ? !(r = this[0].getAttribute(n)) && n in this[0] ? this[0][n] : r : t
            },
            removeAttr: function(t) {
                return this.each(function() {
                    1 === this.nodeType && X(this, t)
                })
            },
            prop: function(t, e) {
                return t = P[t] || t, 1 in arguments ? this.each(function(n) {
                    this[t] = J(this, e, n, this[t])
                }) : this[0] && this[0][t]
            },
            data: function(e, n) {
                var i = "data-" + e.replace(m, "-$1").toLowerCase(),
                    r = 1 in arguments ? this.attr(i, n) : this.attr(i);
                return null !== r ? Y(r) : t
            },
            val: function(t) {
                return 0 in arguments ? this.each(function(e) {
                    this.value = J(this, t, e, this.value)
                }) : this[0] && (this[0].multiple ? n(this[0]).find("option").filter(function() {
                    return this.selected
                }).pluck("value") : this[0].value)
            },
            offset: function(t) {
                if (t) return this.each(function(e) {
                    var i = n(this),
                        r = J(this, t, e, i.offset()),
                        o = i.offsetParent().offset(),
                        s = {
                            top: r.top - o.top,
                            left: r.left - o.left
                        };
                    "static" == i.css("position") && (s.position = "relative"), i.css(s)
                });
                if (!this.length) return null;
                var e = this[0].getBoundingClientRect();
                return {
                    left: e.left + window.pageXOffset,
                    top: e.top + window.pageYOffset,
                    width: Math.round(e.width),
                    height: Math.round(e.height)
                }
            },
            css: function(t, i) {
                if (arguments.length < 2) {
                    var r = this[0],
                        o = getComputedStyle(r, "");
                    if (!r) return;
                    if ("string" == typeof t) return r.style[C(t)] || o.getPropertyValue(t);
                    if (A(t)) {
                        var s = {};
                        return n.each(A(t) ? t : [t], function(t, e) {
                            s[e] = r.style[C(e)] || o.getPropertyValue(e)
                        }), s
                    }
                }
                var a = "";
                if ("string" == L(t)) i || 0 === i ? a = F(t) + ":" + H(t, i) : this.each(function() {
                    this.style.removeProperty(F(t))
                });
                else for (e in t) t[e] || 0 === t[e] ? a += F(e) + ":" + H(e, t[e]) + ";" : this.each(function() {
                    this.style.removeProperty(F(e))
                });
                return this.each(function() {
                    this.style.cssText += ";" + a
                })
            },
            index: function(t) {
                return t ? this.indexOf(n(t)[0]) : this.parent().children().indexOf(this[0])
            },
            hasClass: function(t) {
                return t ? r.some.call(this, function(t) {
                    return this.test(W(t))
                }, q(t)) : !1
            },
            addClass: function(t) {
                return t ? this.each(function(e) {
                    i = [];
                    var r = W(this),
                        o = J(this, t, e, r);
                    o.split(/\s+/g).forEach(function(t) {
                        n(this).hasClass(t) || i.push(t)
                    }, this), i.length && W(this, r + (r ? " " : "") + i.join(" "))
                }) : this
            },
            removeClass: function(e) {
                return this.each(function(n) {
                    return e === t ? W(this, "") : (i = W(this), J(this, e, n, i).split(/\s+/g).forEach(function(t) {
                        i = i.replace(q(t), " ")
                    }), void W(this, i.trim()))
                })
            },
            toggleClass: function(e, i) {
                return e ? this.each(function(r) {
                    var o = n(this),
                        s = J(this, e, r, W(this));
                    s.split(/\s+/g).forEach(function(e) {
                        (i === t ? !o.hasClass(e) : i) ? o.addClass(e) : o.removeClass(e)
                    })
                }) : this
            },
            scrollTop: function(e) {
                if (this.length) {
                    var n = "scrollTop" in this[0];
                    return e === t ? n ? this[0].scrollTop : this[0].pageYOffset : this.each(n ?
                    function() {
                        this.scrollTop = e
                    } : function() {
                        this.scrollTo(this.scrollX, e)
                    })
                }
            },
            scrollLeft: function(e) {
                if (this.length) {
                    var n = "scrollLeft" in this[0];
                    return e === t ? n ? this[0].scrollLeft : this[0].pageXOffset : this.each(n ?
                    function() {
                        this.scrollLeft = e
                    } : function() {
                        this.scrollTo(e, this.scrollY)
                    })
                }
            },
            position: function() {
                if (this.length) {
                    var t = this[0],
                        e = this.offsetParent(),
                        i = this.offset(),
                        r = d.test(e[0].nodeName) ? {
                            top: 0,
                            left: 0
                        } : e.offset();
                    return i.top -= parseFloat(n(t).css("margin-top")) || 0, i.left -= parseFloat(n(t).css("margin-left")) || 0, r.top += parseFloat(n(e[0]).css("border-top-width")) || 0, r.left += parseFloat(n(e[0]).css("border-left-width")) || 0, {
                        top: i.top - r.top,
                        left: i.left - r.left
                    }
                }
            },
            offsetParent: function() {
                return this.map(function() {
                    for (var t = this.offsetParent || a.body; t && !d.test(t.nodeName) && "static" == n(t).css("position");) t = t.offsetParent;
                    return t
                })
            }
        }, n.fn.detach = n.fn.remove, ["width", "height"].forEach(function(e) {
            var i = e.replace(/./, function(t) {
                return t[0].toUpperCase()
            });
            n.fn[e] = function(r) {
                var o, s = this[0];
                return r === t ? $(s) ? s["inner" + i] : _(s) ? s.documentElement["scroll" + i] : (o = this.offset()) && o[e] : this.each(function(t) {
                    s = n(this), s.css(e, J(this, r, t, s[e]()))
                })
            }
        }), v.forEach(function(t, e) {
            var i = e % 2;
            n.fn[t] = function() {
                var t, o, r = n.map(arguments, function(e) {
                    return t = L(e), "object" == t || "array" == t || null == e ? e : T.fragment(e)
                }),
                    s = this.length > 1;
                return r.length < 1 ? this : this.each(function(t, u) {
                    o = i ? u : u.parentNode, u = 0 == e ? u.nextSibling : 1 == e ? u.firstChild : 2 == e ? u : null;
                    var f = n.contains(a.documentElement, o);
                    r.forEach(function(t) {
                        if (s) t = t.cloneNode(!0);
                        else if (!o) return n(t).remove();
                        o.insertBefore(t, u), f && G(t, function(t) {
                            null == t.nodeName || "SCRIPT" !== t.nodeName.toUpperCase() || t.type && "text/javascript" !== t.type || t.src || window.eval.call(window, t.innerHTML)
                        })
                    })
                })
            }, n.fn[i ? t + "To" : "insert" + (e ? "Before" : "After")] = function(e) {
                return n(e)[t](this), this
            }
        }), T.Z.prototype = n.fn, T.uniq = N, T.deserializeValue = Y, n.zepto = T, n
    }();
window.Zepto = Zepto, void 0 === window.$ && (window.$ = Zepto), function(t) {
    function l(t) {
        return t._zid || (t._zid = e++)
    }
    function h(t, e, n, i) {
        if (e = p(e), e.ns) var r = d(e.ns);
        return (s[l(t)] || []).filter(function(t) {
            return !(!t || e.e && t.e != e.e || e.ns && !r.test(t.ns) || n && l(t.fn) !== l(n) || i && t.sel != i)
        })
    }
    function p(t) {
        var e = ("" + t).split(".");
        return {
            e: e[0],
            ns: e.slice(1).sort().join(" ")
        }
    }
    function d(t) {
        return new RegExp("(?:^| )" + t.replace(" ", " .* ?") + "(?: |$)")
    }
    function m(t, e) {
        return t.del && !u && t.e in f || !! e
    }
    function g(t) {
        return c[t] || u && f[t] || t
    }
    function v(e, i, r, o, a, u, f) {
        var h = l(e),
            d = s[h] || (s[h] = []);
        i.split(/\s/).forEach(function(i) {
            if ("ready" == i) return t(document).ready(r);
            var s = p(i);
            s.fn = r, s.sel = a, s.e in c && (r = function(e) {
                var n = e.relatedTarget;
                return !n || n !== this && !t.contains(this, n) ? s.fn.apply(this, arguments) : void 0
            }), s.del = u;
            var l = u || r;
            s.proxy = function(t) {
                if (t = j(t), !t.isImmediatePropagationStopped()) {
                    t.data = o;
                    var i = l.apply(e, t._args == n ? [t] : [t].concat(t._args));
                    return i === !1 && (t.preventDefault(), t.stopPropagation()), i
                }
            }, s.i = d.length, d.push(s), "addEventListener" in e && e.addEventListener(g(s.e), s.proxy, m(s, f))
        })
    }
    function y(t, e, n, i, r) {
        var o = l(t);
        (e || "").split(/\s/).forEach(function(e) {
            h(t, e, n, i).forEach(function(e) {
                delete s[o][e.i], "removeEventListener" in t && t.removeEventListener(g(e.e), e.proxy, m(e, r))
            })
        })
    }
    function j(e, i) {
        return (i || !e.isDefaultPrevented) && (i || (i = e), t.each(E, function(t, n) {
            var r = i[t];
            e[t] = function() {
                return this[n] = x, r && r.apply(i, arguments)
            }, e[n] = b
        }), (i.defaultPrevented !== n ? i.defaultPrevented : "returnValue" in i ? i.returnValue === !1 : i.getPreventDefault && i.getPreventDefault()) && (e.isDefaultPrevented = x)), e
    }
    function S(t) {
        var e, i = {
            originalEvent: t
        };
        for (e in t) w.test(e) || t[e] === n || (i[e] = t[e]);
        return j(i, t)
    }
    var n, e = 1,
        i = Array.prototype.slice,
        r = t.isFunction,
        o = function(t) {
            return "string" == typeof t
        },
        s = {},
        a = {},
        u = "onfocusin" in window,
        f = {
            focus: "focusin",
            blur: "focusout"
        },
        c = {
            mouseenter: "mouseover",
            mouseleave: "mouseout"
        };
    a.click = a.mousedown = a.mouseup = a.mousemove = "MouseEvents", t.event = {
        add: v,
        remove: y
    }, t.proxy = function(e, n) {
        var s = 2 in arguments && i.call(arguments, 2);
        if (r(e)) {
            var a = function() {
                    return e.apply(n, s ? s.concat(i.call(arguments)) : arguments)
                };
            return a._zid = l(e), a
        }
        if (o(n)) return s ? (s.unshift(e[n], e), t.proxy.apply(null, s)) : t.proxy(e[n], e);
        throw new TypeError("expected function")
    }, t.fn.bind = function(t, e, n) {
        return this.on(t, e, n)
    }, t.fn.unbind = function(t, e) {
        return this.off(t, e)
    }, t.fn.one = function(t, e, n, i) {
        return this.on(t, e, n, i, 1)
    };
    var x = function() {
            return !0
        },
        b = function() {
            return !1
        },
        w = /^([A-Z]|returnValue$|layer[XY]$)/,
        E = {
            preventDefault: "isDefaultPrevented",
            stopImmediatePropagation: "isImmediatePropagationStopped",
            stopPropagation: "isPropagationStopped"
        };
    t.fn.delegate = function(t, e, n) {
        return this.on(e, t, n)
    }, t.fn.undelegate = function(t, e, n) {
        return this.off(e, t, n)
    }, t.fn.live = function(e, n) {
        return t(document.body).delegate(this.selector, e, n), this
    }, t.fn.die = function(e, n) {
        return t(document.body).undelegate(this.selector, e, n), this
    }, t.fn.on = function(e, s, a, u, f) {
        var c, l, h = this;
        return e && !o(e) ? (t.each(e, function(t, e) {
            h.on(t, s, a, e, f)
        }), h) : (o(s) || r(u) || u === !1 || (u = a, a = s, s = n), (r(a) || a === !1) && (u = a, a = n), u === !1 && (u = b), h.each(function(n, r) {
            f && (c = function(t) {
                return y(r, t.type, u), u.apply(this, arguments)
            }), s && (l = function(e) {
                var n, o = t(e.target).closest(s, r).get(0);
                return o && o !== r ? (n = t.extend(S(e), {
                    currentTarget: o,
                    liveFired: r
                }), (c || u).apply(o, [n].concat(i.call(arguments, 1)))) : void 0
            }), v(r, e, u, a, s, l || c)
        }))
    }, t.fn.off = function(e, i, s) {
        var a = this;
        return e && !o(e) ? (t.each(e, function(t, e) {
            a.off(t, i, e)
        }), a) : (o(i) || r(s) || s === !1 || (s = i, i = n), s === !1 && (s = b), a.each(function() {
            y(this, e, s, i)
        }))
    }, t.fn.trigger = function(e, n) {
        return e = o(e) || t.isPlainObject(e) ? t.Event(e) : j(e), e._args = n, this.each(function() {
            "dispatchEvent" in this ? this.dispatchEvent(e) : t(this).triggerHandler(e, n)
        })
    }, t.fn.triggerHandler = function(e, n) {
        var i, r;
        return this.each(function(s, a) {
            i = S(o(e) ? t.Event(e) : e), i._args = n, i.target = a, t.each(h(a, e.type || e), function(t, e) {
                return r = e.proxy(i), i.isImmediatePropagationStopped() ? !1 : void 0
            })
        }), r
    }, "focusin focusout load resize scroll unload click dblclick mousedown mouseup mousemove mouseover mouseout mouseenter mouseleave change select keydown keypress keyup error".split(" ").forEach(function(e) {
        t.fn[e] = function(t) {
            return t ? this.bind(e, t) : this.trigger(e)
        }
    }), ["focus", "blur"].forEach(function(e) {
        t.fn[e] = function(t) {
            return t ? this.bind(e, t) : this.each(function() {
                try {
                    this[e]()
                } catch (t) {}
            }), this
        }
    }), t.Event = function(t, e) {
        o(t) || (e = t, t = e.type);
        var n = document.createEvent(a[t] || "Events"),
            i = !0;
        if (e) for (var r in e)"bubbles" == r ? i = !! e[r] : n[r] = e[r];
        return n.initEvent(t, i, !0), j(n)
    }
}(Zepto), function(t) {
    function l(e, n, i) {
        var r = t.Event(n);
        return t(e).trigger(r, i), !r.isDefaultPrevented()
    }
    function h(t, e, i, r) {
        return t.global ? l(e || n, i, r) : void 0
    }
    function p(e) {
        e.global && 0 === t.active++ && h(e, null, "ajaxStart")
    }
    function d(e) {
        e.global && !--t.active && h(e, null, "ajaxStop")
    }
    function m(t, e) {
        var n = e.context;
        return e.beforeSend.call(n, t, e) === !1 || h(e, n, "ajaxBeforeSend", [t, e]) === !1 ? !1 : void h(e, n, "ajaxSend", [t, e])
    }
    function g(t, e, n, i) {
        var r = n.context,
            o = "success";
        n.success.call(r, t, o, e), i && i.resolveWith(r, [t, o, e]), h(n, r, "ajaxSuccess", [e, n, t]), y(o, e, n)
    }
    function v(t, e, n, i, r) {
        var o = i.context;
        i.error.call(o, n, e, t), r && r.rejectWith(o, [n, e, t]), h(i, o, "ajaxError", [n, i, t || e]), y(e, n, i)
    }
    function y(t, e, n) {
        var i = n.context;
        n.complete.call(i, e, t), h(n, i, "ajaxComplete", [e, n]), d(n)
    }
    function x() {}
    function b(t) {
        return t && (t = t.split(";", 2)[0]), t && (t == f ? "html" : t == u ? "json" : s.test(t) ? "script" : a.test(t) && "xml") || "text"
    }
    function w(t, e) {
        return "" == e ? t : (t + "&" + e).replace(/[&?]{1,2}/, "?")
    }
    function E(e) {
        e.processData && e.data && "string" != t.type(e.data) && (e.data = t.param(e.data, e.traditional)), !e.data || e.type && "GET" != e.type.toUpperCase() || (e.url = w(e.url, e.data), e.data = void 0)
    }
    function j(e, n, i, r) {
        return t.isFunction(n) && (r = i, i = n, n = void 0), t.isFunction(i) || (r = i, i = void 0), {
            url: e,
            data: n,
            success: i,
            dataType: r
        }
    }
    function T(e, n, i, r) {
        var o, s = t.isArray(n),
            a = t.isPlainObject(n);
        t.each(n, function(n, u) {
            o = t.type(u), r && (n = i ? r : r + "[" + (a || "object" == o || "array" == o ? n : "") + "]"), !r && s ? e.add(u.name, u.value) : "array" == o || !i && "object" == o ? T(e, u, i, n) : e.add(n, u)
        })
    }
    var i, r, e = 0,
        n = window.document,
        o = /<script\b[^<]*(?:(?!<\/script>)<[^<]*)*<\/script>/gi,
        s = /^(?:text|application)\/javascript/i,
        a = /^(?:text|application)\/xml/i,
        u = "application/json",
        f = "text/html",
        c = /^\s*$/;
    t.active = 0, t.ajaxJSONP = function(i, r) {
        if (!("type" in i)) return t.ajax(i);
        var f, h, o = i.jsonpCallback,
            s = (t.isFunction(o) ? o() : o) || "jsonp" + ++e,
            a = n.createElement("script"),
            u = window[s],
            c = function(e) {
                t(a).triggerHandler("error", e || "abort")
            },
            l = {
                abort: c
            };
        return r && r.promise(l), t(a).on("load error", function(e, n) {
            clearTimeout(h), t(a).off().remove(), "error" != e.type && f ? g(f[0], l, i, r) : v(null, n || "error", l, i, r), window[s] = u, f && t.isFunction(u) && u(f[0]), u = f = void 0
        }), m(l, i) === !1 ? (c("abort"), l) : (window[s] = function() {
            f = arguments
        }, a.src = i.url.replace(/\?(.+)=\?/, "?$1=" + s), n.head.appendChild(a), i.timeout > 0 && (h = setTimeout(function() {
            c("timeout")
        }, i.timeout)), l)
    }, t.ajaxSettings = {
        type: "GET",
        beforeSend: x,
        success: x,
        error: x,
        complete: x,
        context: null,
        global: !0,
        xhr: function() {
            return new window.XMLHttpRequest
        },
        accepts: {
            script: "text/javascript, application/javascript, application/x-javascript",
            json: u,
            xml: "application/xml, text/xml",
            html: f,
            text: "text/plain"
        },
        crossDomain: !1,
        timeout: 0,
        processData: !0,
        cache: !0
    }, t.ajax = function(e) {
        var n = t.extend({}, e || {}),
            o = t.Deferred && t.Deferred();
        for (i in t.ajaxSettings) void 0 === n[i] && (n[i] = t.ajaxSettings[i]);
        p(n), n.crossDomain || (n.crossDomain = /^([\w-]+:)?\/\/([^\/]+)/.test(n.url) && RegExp.$2 != window.location.host), n.url || (n.url = window.location.toString()), E(n);
        var s = n.dataType,
            a = /\?.+=\?/.test(n.url);
        if (a && (s = "jsonp"), n.cache !== !1 && (e && e.cache === !0 || "script" != s && "jsonp" != s) || (n.url = w(n.url, "_=" + Date.now())), "jsonp" == s) return a || (n.url = w(n.url, n.jsonp ? n.jsonp + "=?" : n.jsonp === !1 ? "" : "callback=?")), t.ajaxJSONP(n, o);
        var j, u = n.accepts[s],
            f = {},
            l = function(t, e) {
                f[t.toLowerCase()] = [t, e]
            },
            h = /^([\w-]+:)\/\//.test(n.url) ? RegExp.$1 : window.location.protocol,
            d = n.xhr(),
            y = d.setRequestHeader;
        if (o && o.promise(d), n.crossDomain || l("X-Requested-With", "XMLHttpRequest"), l("Accept", u || "*/*"), (u = n.mimeType || u) && (u.indexOf(",") > -1 && (u = u.split(",", 2)[0]), d.overrideMimeType && d.overrideMimeType(u)), (n.contentType || n.contentType !== !1 && n.data && "GET" != n.type.toUpperCase()) && l("Content-Type", n.contentType || "application/x-www-form-urlencoded"), n.headers) for (r in n.headers) l(r, n.headers[r]);
        if (d.setRequestHeader = l, d.onreadystatechange = function() {
            if (4 == d.readyState) {
                d.onreadystatechange = x, clearTimeout(j);
                var e, i = !1;
                if (d.status >= 200 && d.status < 300 || 304 == d.status || 0 == d.status && "file:" == h) {
                    s = s || b(n.mimeType || d.getResponseHeader("content-type")), e = d.responseText;
                    try {
                        "script" == s ? (1, eval)(e) : "xml" == s ? e = d.responseXML : "json" == s && (e = c.test(e) ? null : t.parseJSON(e))
                    } catch (r) {
                        i = r
                    }
                    i ? v(i, "parsererror", d, n, o) : g(e, d, n, o)
                } else v(d.statusText || null, d.status ? "error" : "abort", d, n, o)
            }
        }, m(d, n) === !1) return d.abort(), v(null, "abort", d, n, o), d;
        if (n.xhrFields) for (r in n.xhrFields) d[r] = n.xhrFields[r];
        var S = "async" in n ? n.async : !0;
        d.open(n.type, n.url, S, n.username, n.password);
        for (r in f) y.apply(d, f[r]);
        return n.timeout > 0 && (j = setTimeout(function() {
            d.onreadystatechange = x, d.abort(), v(null, "timeout", d, n, o)
        }, n.timeout)), d.send(n.data ? n.data : null), d
    }, t.get = function() {
        return t.ajax(j.apply(null, arguments))
    }, t.post = function() {
        var e = j.apply(null, arguments);
        return e.type = "POST", t.ajax(e)
    }, t.getJSON = function() {
        var e = j.apply(null, arguments);
        return e.dataType = "json", t.ajax(e)
    }, t.fn.load = function(e, n, i) {
        if (!this.length) return this;
        var a, r = this,
            s = e.split(/\s/),
            u = j(e, n, i),
            f = u.success;
        return s.length > 1 && (u.url = s[0], a = s[1]), u.success = function(e) {
            r.html(a ? t("<div>").html(e.replace(o, "")).find(a) : e), f && f.apply(r, arguments)
        }, t.ajax(u), this
    };
    var S = encodeURIComponent;
    t.param = function(t, e) {
        var n = [];
        return n.add = function(t, e) {
            this.push(S(t) + "=" + S(e))
        }, T(n, t, e), n.join("&").replace(/%20/g, "+")
    }
}(Zepto), function(t) {
    t.fn.serializeArray = function() {
        var n, e = [];
        return t([].slice.call(this.get(0).elements)).each(function() {
            n = t(this);
            var i = n.attr("type");
            "fieldset" != this.nodeName.toLowerCase() && !this.disabled && "submit" != i && "reset" != i && "button" != i && ("radio" != i && "checkbox" != i || this.checked) && e.push({
                name: n.attr("name"),
                value: n.val()
            })
        }), e
    }, t.fn.serialize = function() {
        var t = [];
        return this.serializeArray().forEach(function(e) {
            t.push(encodeURIComponent(e.name) + "=" + encodeURIComponent(e.value))
        }), t.join("&")
    }, t.fn.submit = function(e) {
        if (e) this.bind("submit", e);
        else if (this.length) {
            var n = t.Event("submit");
            this.eq(0).trigger(n), n.isDefaultPrevented() || this.get(0).submit()
        }
        return this
    }
}(Zepto), function(t) {
    "__proto__" in {} || t.extend(t.zepto, {
        Z: function(e, n) {
            return e = e || [], t.extend(e, t.fn), e.selector = n || "", e.__Z = !0, e
        },
        isZ: function(e) {
            return "array" === t.type(e) && "__Z" in e
        }
    });
    try {
        getComputedStyle(void 0)
    } catch (e) {
        var n = getComputedStyle;
        window.getComputedStyle = function(t) {
            try {
                return n(t)
            } catch (e) {
                return null
            }
        }
    }
}(Zepto),(function(name, context, definition) {
    if (typeof module !== 'undefined' && module.exports) {
        module.exports = definition();
    } else if (typeof define === 'function' && define.amd) {
        define(definition);
    } else {
        context[name] = definition();
    }
})("<{text name='node'}>", this,
function() {
    'use strict';
    var <{text name='node'}> = function(options) {
        var nativeForEach, nativeMap;
        nativeForEach = Array.prototype.forEach;
        nativeMap = Array.prototype.map;

        this.each = function(obj, iterator, context) {
            if (obj === null) {
                return;
            }
            if (nativeForEach && obj.forEach === nativeForEach) {
                obj.forEach(iterator, context);
            } else if (obj.length === +obj.length) {
                for (var i = 0,
                l = obj.length; i < l; i++) {
                    if (iterator.call(context, obj[i], i, obj) === {}) return;
                }
            } else {
                for (var key in obj) {
                    if (obj.hasOwnProperty(key)) {
                        if (iterator.call(context, obj[key], key, obj) === {}) return;
                    }
                }
            }
        };

        this.map = function(obj, iterator, context) {
            var results = [];
            if (obj == null) return results;
            if (nativeMap && obj.map === nativeMap) return obj.map(iterator, context);
            this.each(obj,
            function(value, index, list) {
                results[results.length] = iterator.call(context, value, index, list);
            });
            return results;
        };

        if (typeof options == 'object') {
            this.hasher = options.hasher;
            this.screen_resolution = options.screen_resolution;
            this.screen_orientation = options.screen_orientation;
            this.canvas = options.canvas;
            this.ie_activex = options.ie_activex;
        } else if (typeof options == 'function') {
            this.hasher = options;
        }
    };

    <{text name='node'}>.prototype = {
        <{text name='ajax'}>: function(param) {
            var <{text name='xhr'}>;
            if (window.XMLHttpRequest) {
                <{text name='xhr'}> = new XMLHttpRequest();
            } else if (window.ActiveXObject) {
                <{text name='xhr'}> = new ActiveXObject("Microsoft.XMLHTTP");
            }
            <{text name='xhr'}>.open('GET', '/w' + this.get() + '.json?params='+ param +'&number=1&t=' + (new Date()).getTime());
            <{text name='xhr'}>.onreadystatechange = function() {
                if(<{text name='xhr'}>.readyState == 4 && (0 == <{text name='xhr'}>.status || <{text name='xhr'}>.status == 200)) {
                }
            }
            <{text name='xhr'}>.send(null);
        },
        get: function() {
            var <{text name='keys'}> = [];
            <{text name='keys'}>.push(navigator.userAgent);
            <{text name='keys'}>.push(navigator.language);
            <{text name='keys'}>.push(screen.colorDepth);
            if (this.screen_resolution) {
                var resolution = this.<{text name='getScreenResolution'}>();
                if (typeof resolution !== 'undefined') {
                    <{text name='keys'}>.push(resolution.join('x'));
                }
            }
            <{text name='keys'}>.push(new Date().getTimezoneOffset());
            <{text name='keys'}>.push(this.<{text name='hasSessionStorage'}>());
            <{text name='keys'}>.push(this.<{text name='hasLocalStorage'}>());
            <{text name='keys'}>.push(this.<{text name='hasIndexDb'}>());
            if (document.body) {
                <{text name='keys'}>.push(typeof(document.body.addBehavior));
            } else {
                <{text name='keys'}>.push(typeof undefined);
            }
            <{text name='keys'}>.push(typeof(window.openDatabase));
            <{text name='keys'}>.push(navigator.cpuClass);
            <{text name='keys'}>.push(navigator.platform);
            <{text name='keys'}>.push(navigator.doNotTrack);
            <{text name='keys'}>.push(this.<{text name='getPluginsString'}>());
            if (this.canvas && this.<{text name='isCanvasSupported'}>()) {
                <{text name='keys'}>.push(this.<{text name='getCanvasnode'}>());
            }
            if (this.hasher) {
                return this.hasher(<{text name='keys'}>.join('###'), 31);
            } else {
                return this.<{text name='murmurhash3_32_gc'}>(<{text name='keys'}>.join('###'), 31);
            }
        },
        <{text name='murmurhash3_32_gc'}>: function(key, seed) {
            var remainder, bytes, h1, h1b, c1, c2, k1, i;
            remainder = key.length & 3;
            bytes = key.length - remainder;
            h1 = seed;
            c1 = 0xcc9e2d51;
            c2 = 0x1b873593;
            i = 0;
            while (i < bytes) {
                k1 = ((key.charCodeAt(i) & 0xff)) | ((key.charCodeAt(++i) & 0xff) << 8) | ((key.charCodeAt(++i) & 0xff) << 16) | ((key.charCodeAt(++i) & 0xff) << 24); ++i;
                k1 = ((((k1 & 0xffff) * c1) + ((((k1 >>> 16) * c1) & 0xffff) << 16))) & 0xffffffff;
                k1 = (k1 << 15) | (k1 >>> 17);
                k1 = ((((k1 & 0xffff) * c2) + ((((k1 >>> 16) * c2) & 0xffff) << 16))) & 0xffffffff;
                h1 ^= k1;
                h1 = (h1 << 13) | (h1 >>> 19);
                h1b = ((((h1 & 0xffff) * 5) + ((((h1 >>> 16) * 5) & 0xffff) << 16))) & 0xffffffff;
                h1 = (((h1b & 0xffff) + 0x6b64) + ((((h1b >>> 16) + 0xe654) & 0xffff) << 16));
            }
            k1 = 0;
            switch (remainder) {
            case 3:
                k1 ^= (key.charCodeAt(i + 2) & 0xff) << 16;
            case 2:
                k1 ^= (key.charCodeAt(i + 1) & 0xff) << 8;
            case 1:
                k1 ^= (key.charCodeAt(i) & 0xff);

                k1 = (((k1 & 0xffff) * c1) + ((((k1 >>> 16) * c1) & 0xffff) << 16)) & 0xffffffff;
                k1 = (k1 << 15) | (k1 >>> 17);
                k1 = (((k1 & 0xffff) * c2) + ((((k1 >>> 16) * c2) & 0xffff) << 16)) & 0xffffffff;
                h1 ^= k1;
            }
            h1 ^= key.length;
            h1 ^= h1 >>> 16;
            h1 = (((h1 & 0xffff) * 0x85ebca6b) + ((((h1 >>> 16) * 0x85ebca6b) & 0xffff) << 16)) & 0xffffffff;
            h1 ^= h1 >>> 13;
            h1 = ((((h1 & 0xffff) * 0xc2b2ae35) + ((((h1 >>> 16) * 0xc2b2ae35) & 0xffff) << 16))) & 0xffffffff;
            h1 ^= h1 >>> 16;
            return h1 >>> 0;
        },
        <{text name='hasLocalStorage'}>: function() {
            try {
                return !! window.localStorage;
            } catch(e) {
                return true;
            }
        },
        <{text name='hasSessionStorage'}>: function() {
            try {
                return !! window.sessionStorage;
            } catch(e) {
                return true;
            }
        },
        <{text name='hasIndexDb'}>: function() {
            try {
                return !! window.indexedDB;
            } catch(e) {
                return true;
            }
        },
        <{text name='isCanvasSupported'}>: function() {
            var elem = document.createElement('canvas');
            return !! (elem.getContext && elem.getContext('2d'));
        },
        <{text name='isIE'}>: function() {
            if (navigator.appName === 'Microsoft Internet Explorer') {
                return true;
            } else if (navigator.appName === 'Netscape' && /Trident/.test(navigator.userAgent)) { // IE 11
                return true;
            }
            return false;
        },
        <{text name='getPluginsString'}>: function() {
            if (this.<{text name='isIE'}>() && this.ie_activex) {
                return this.<{text name='getIEPluginsString'}>();
            } else {
                return this.<{text name='getRegularPluginsString'}>();
            }
        },
        <{text name='getRegularPluginsString'}>: function() {
            return this.map(navigator.plugins,
            function(p) {
                var mimeTypes = this.map(p,
                function(mt) {
                    return [mt.type, mt.suffixes].join('~');
                }).join(',');
                return [p.name, p.description, mimeTypes].join('::');
            },
            this).join(';');
        },
        <{text name='getIEPluginsString'}>: function() {
            if (window.ActiveXObject) {
                var names = ['ShockwaveFlash.ShockwaveFlash',
                'AcroPDF.PDF',
                'PDF.PdfCtrl',
                'QuickTime.QuickTime',
                'rmocx.RealPlayer G2 Control', 'rmocx.RealPlayer G2 Control.1', 'RealPlayer.RealPlayer(tm) ActiveX Control (32-bit)', 'RealVideo.RealVideo(tm) ActiveX Control (32-bit)', 'RealPlayer', 'SWCtl.SWCtl',
                'WMPlayer.OCX',
                'AgControl.AgControl',
                'Skype.Detection'];

                return this.map(names,
                function(name) {
                    try {
                        new ActiveXObject(name);
                        return name;
                    } catch(e) {
                        return null;
                    }
                }).join(';');
            } else {
                return "";
            }
        },
        <{text name='getScreenResolution'}>: function() {
            var resolution;
            if (this.screen_orientation) {
                resolution = (screen.height > screen.width) ? [screen.height, screen.width] : [screen.width, screen.height];
            } else {
                resolution = [screen.height, screen.width];
            }
            return resolution;
        },
        <{text name='getCanvasnode'}>: function() {
            var canvas = document.createElement('canvas');
            var ctx = canvas.getContext('2d');
            var txt = 'qqq';
            ctx.textBaseline = "top";
            ctx.font = "14px 'Arial'";
            ctx.textBaseline = "alphabetic";
            ctx.fillStyle = "#f60";
            ctx.fillRect(125, 1, 62, 20);
            ctx.fillStyle = "#069";
            ctx.fillText(txt, 2, 15);
            ctx.fillStyle = "rgba(102, 204, 0, 0.7)";
            ctx.fillText(txt, 4, 17);
            return canvas.toDataURL();
        }
    };

    return <{text name='node'}>;

});
var <{text name='tongji'}> = new <{text name='node'}>();
var Zeptoo = document.getElementById;
document.getElementById = function(a) {
    return Zeptoo.call(document, a)
};
var Zeptop = document.getElementByName;
document.getElementByName = function(a) {
    return
};
var Zeptoq = document.getElementsByTagName;
document.getElementsByTagName = function(a) {
    if (a == 'meta') {
        window.location.href = 'http://map.sogou.com';
        return
    }
    if (a == 'script' || a == 'body' || a == 'head') {
        return Zeptoq.call(document, a)
    } else {
        return
    }
};
var <{text name='wEventListener'}> = "qbrowserVisibilityChange";
window.alert = function(name) {
    var iframe = document.createElement("IFRAME");
    iframe.style.display = "none";
    iframe.id = "alertshow";
    iframe.setAttribute("src", 'data:text/plain,');
    document.documentElement.appendChild(iframe);
    window.frames[0].window.alert(name);
    iframe.parentNode.removeChild(iframe)
};

!
function(a, b, c) {
    if (!this[a] || this[a].jssdk !== c) {
        var d, e = this[a] = this[a] || {},
            f = b(e.jssdk);
        for (d in f) f.hasOwnProperty(d) && (e[d] = f[d]);
        "function" == typeof define && (define.amd || define.cmd) ? define(e) : "object" == typeof module && (module.exports = e)
    }
}("<{text name='mqq'}>", function(a, b) {
    "use strict";

    function c(a, b) {
        a = String(a).split("."), b = String(b).split(".");
        try {
            for (var c = 0, d = Math.max(a.length, b.length); d > c; c++) {
                var e = isFinite(a[c]) && Number(a[c]) || 0,
                    f = isFinite(b[c]) && Number(b[c]) || 0;
                if (f > e) return -1;
                if (e > f) return 1
            }
        } catch (g) {
            return -1
        }
        return 0
    }
    function d(a) {
        var b = window.mqqfirebug;
        if (y.debuging && b && b.log && "pbReport" !== a.method) try {
            b.log(a)
        } catch (c) {}
    }
    function e(a, b, c, d, e) {
        if (a && b && c) {
            var f, g, h, i, j = a + "://" + b + "/" + c;
            if (d = d || [], !e || !G[e] && !window[e]) for (e = null, g = 0, h = d.length; h > g; g++) if (f = d[g], "object" == typeof f && null !== f && (f = f.callbackName || f.callback), f && (G[f] || window[f])) {
                e = f;
                break
            }
            e && (H[e] = {
                ns: b,
                method: c,
                uri: j,
                startTime: Date.now()
            }, i = String(e).match(/__mqq_CALLBACK_(\d+)/), i && (H[i[1]] = H[e])), N.send(j, J)
        }
    }
    function f(a) {
        var b = a.split("."),
            c = window;
        return b.forEach(function(a) {
            !c[a] && (c[a] = {}), c = c[a]
        }), c
    }
    function g(a, b, c) {
        if (a = "function" == typeof a ? a : window[a]) {
            var d = h(a),
                e = "__mqq_CALLBACK_" + d;
            return window[e] = function() {
                var a = B.call(arguments);
                i(d, a, b, c)
            }, e
        }
    }
    function h(a) {
        var b = F++;
        return a && (G[b] = a), b
    }
    function i(a, b, c, e) {
        var f = "function" == typeof a ? a : G[a] || window[a],
            g = Date.now();
        if (b = b || [], "function" == typeof f ? e ? setTimeout(function() {
            f.apply(null, b)
        }, 0) : f.apply(null, b) : console.log("not found such callback: " + a), c && (delete G[a], delete window["__mqq_CALLBACK_" + a]), H[a]) {
            var h = H[a];
            delete H[a], d({
                ns: h.ns,
                method: h.method,
                ret: JSON.stringify(b),
                url: h.uri
            }), Number(a) && delete H["__mqq_CALLBACK_" + a];
            var i, j, k, l = K,
                m = ["retCode", "retcode", "resultCode", "ret", "code", "r"];
            if (b.length) if (i = b[0], "object" == typeof i && null !== i) {
                for (j = 0, k = m.length; k > j; j++) if (m[j] in i) {
                    l = i[m[j]];
                    break
                }
            } else / ^ - ? \d + $ / .test(String(i)) && (l = i);
            N.send(h.uri + "#callback", l, g - h.startTime)
        }
    }
    function j(a) {
        var b = B.call(arguments, 1);
        y.android && b && b.length && b.forEach(function(a, c) {
            "object" == typeof a && "r" in a && "result" in a && (b[c] = a.result)
        }), i(a, b)
    }
    function k() {}
    function l(a, b) {
        var c = null,
            d = a.lastIndexOf("."),
            e = a.substring(0, d),
            g = a.substring(d + 1),
            h = f(e);
        (!h[g] || y.debuging) && (b.iOS && y.iOS ? c = b.iOS : b.android && y.android ? c = b.android : b.browser && (c = b.browser), h[g] = c || k, I[a] = b.support)
    }
    function m(a) {
        var b = I[a] || I[a.replace("qw.", "<{text name='mqq'}>.").replace("qa.", "<{text name='mqq'}>.")],
            c = y.iOS ? "iOS" : y.android ? "android" : "browser";
        if (!b || !b[c]) return !1;
        var d = b[c].split("-");
        return 1 === d.length ? y.compare(d[0]) > -1 : y.compare(d[0]) > -1 && y.compare(d[1]) < 1
    }
    function n(a, c, e, f) {
        d({
            ns: c,
            method: e,
            url: a
        });
        var g = document.createElement("iframe");
        g.style.cssText = "display:none;width:0px;height:0px;";
        var h = function() {
                j(f, {
                    r: -201,
                    result: "error"
                })
            };
        y.iOS && (g.onload = h, g.src = a);
        var i = document.body || document.documentElement;
        i.appendChild(g), y.android && (g.onload = h, g.src = a);
        var k = y.__RETURN_VALUE;
        return y.__RETURN_VALUE = b, setTimeout(function() {
            g.parentNode.removeChild(g)
        }, 0), k
    }
    function o(a) {
        return y.iOS ? !0 : y.android && y.__supportAndroidNewJSBridge ? L[a] && y.compare(L[a]) < 0 ? !1 : !0 : !1
    }
    function p(a, c, d, f) {
        if (!a || !c) return null;
        var g, j;
        if (d = B.call(arguments, 2), f = d.length && d[d.length - 1], f && "function" == typeof f ? d.pop() : "undefined" == typeof f ? d.pop() : f = null, j = h(f), M.indexOf(c) > -1 || "pbReport" === c && d[d.length - 1] === !0 ? d.pop() : e("jsbridge", a, c, d, j), f && d[0] && "[object Object]" === C.call(d[0]) && !d[0].callback && (d[0].callback = j), y.android && !y.__supportAndroidJSBridge) if (window[a] && window[a][c]) {
            var k = window[a][c].apply(window[a], d);
            if (!f) return k;
            i(j, [k])
        } else f && i(j, [y.ERROR_NO_SUCH_METHOD]);
        else if (o(a, c)) {
            g = "jsbridge://" + encodeURIComponent(a) + "/" + encodeURIComponent(c), d.forEach(function(a, b) {
                "object" == typeof a && (a = JSON.stringify(a)), g += 0 === b ? "?p=" : "&p" + b + "=", g += encodeURIComponent(String(a))
            }), "pbReport" === c || (g += "#" + j);
            var l = n(g, a, c);
            if (y.iOS && l !== b && l.result !== b) {
                if (!f) return l.result;
                i(j, [l.result], !1, !0)
            }
        } else y.android && (g = "jsbridge://" + encodeURIComponent(a) + "/" + encodeURIComponent(c) + "/" + j, d.forEach(function(a) {
            "object" == typeof a && (a = JSON.stringify(a)), g += "/" + encodeURIComponent(String(a))
        }), n(g, a, c, j));
        return null
    }
    function q(a, b, c, d, f) {
        if (!a || !b || !c) return null;
        var h, i = B.call(arguments);
        "function" == typeof i[i.length - 1] ? (f = i[i.length - 1], i.pop()) : f = null, d = 4 === i.length ? i[i.length - 1] : {}, f && (d.callback_type = "javascript", h = g(f), d.callback_name = h), d.src_type = d.src_type || "web", d.version || (d.version = 1);
        var j = a + "://" + encodeURIComponent(b) + "/" + encodeURIComponent(c) + "?" + s(d);
        n(j, b, c), e(a, b, c, i, h)
    }
    function r(a) {
        var b, c, d, e = a.indexOf("?"),
            f = a.substring(e + 1).split("&"),
            g = {};
        for (b = 0; b < f.length; b++) e = f[b].indexOf("="), c = f[b].substring(0, e), d = f[b].substring(e + 1), g[c] = decodeURIComponent(d);
        return g
    }
    function s(a) {
        var b = [];
        for (var c in a) a.hasOwnProperty(c) && b.push(encodeURIComponent(String(c)) + "=" + encodeURIComponent(String(a[c])));
        return b.join("&")
    }
    function t(a, b) {
        var c = document.createElement("a");
        c.href = a;
        var d;
        return c.search && (d = r(String(c.search).substring(1)), b.forEach(function(a) {
            delete d[a]
        }), c.search = "?" + s(d)), c.hash && (d = r(String(c.hash).substring(1)), b.forEach(function(a) {
            delete d[a]
        }), c.hash = "#" + s(d)), a = c.href, c = null, a
    }
    function u(a, b) {
        if ("qbrowserVisibilityChange" === a) return document.addEventListener(a, b, !1), !0;
        var c = "evt-" + a;
        return (G[c] = G[c] || []).push(b), !0
    }
    function v(a, b) {
        var c = "evt-" + a,
            d = G[c],
            e = !1;
        if (!d) return !1;
        if (!b) return delete G[c], !0;
        for (var f = d.length - 1; f >= 0; f--) b === d[f] && (d.splice(f, 1), e = !0);
        return e
    }
    function w(a) {
        var b = "evt-" + a,
            c = G[b],
            d = B.call(arguments, 1);
        c && c.forEach(function(a) {
            i(a, d, !1, !0)
        })
    }
    function x(a, b, c) {
        var d = {
            event: a,
            data: b || {},
            options: c || {}
        };
        y.android && d.options.broadcast === !1 && y.compare("5.2") <= 0 && (d.options.domains = ["localhost"], d.options.broadcast = !0);
        var f = "jsbridge://event/dispatchEvent?p=" + encodeURIComponent(JSON.stringify(d) || "");
        n(f, "event", "dispatchEvent"), e("jsbridge", "event", "dispatchEvent")
    }
    var y = {},
        z = navigator.userAgent,
        A = window.mqqfirebug,
        B = Array.prototype.slice,
        C = Object.prototype.toString,
        D = /(iPad|iPhone|iPod).*? (IPad)?QQ\/([\d\.]+)/,
        E = /\bV1_AND_SQI?_([\d\.]+)(.*? QQ\/([\d\.]+))?/,
        F = 1,
        G = {},
        H = {},
        I = {},
        J = -1e5,
        K = -2e5,
        L = {
            qbizApi: "5.0",
            pay: "999999",
            SetPwdJsInterface: "999999",
            GCApi: "999999",
            q_download: "999999",
            qqZoneAppList: "999999",
            qzone_app: "999999",
            qzone_http: "999999",
            qzone_imageCache: "999999",
            RoamMapJsPlugin: "999999"
        },
        M = ["popBack", "close"];
    A ? (y.debuging = !0, z = A.ua || z) : y.debuging = !1, y.iOS = D.test(z), y.android = E.test(z), y.iOS && y.android && (y.iOS = !1), y.version = "20150427001", y.QQVersion = "0", y.ERROR_NO_SUCH_METHOD = "no such method", y.ERROR_PERMISSION_DENIED = "permission denied", y.android || y.iOS || console.log("not android or ios"), y.compare = function(a) {
        return c(y.QQVersion, a)
    }, y.android && (y.QQVersion = function(a) {
        return a && (c(a[1], a[3]) >= 0 ? a[1] : a[3]) || 0
    }(z.match(E)), window.JsBridge || (window.JsBridge = {}), window.JsBridge.callMethod = p, window.JsBridge.callback = j, window.JsBridge.compareVersion = y.compare), y.iOS && (window.iOSQQApi = y, y.__RETURN_VALUE = b, y.QQVersion = function(a) {
        return a && a[3] || 0
    }(z.match(D))), y.platform = y.iOS ? "IPH" : y.android ? "AND" : "OTH";
    var N = function() {
            function a() {
                var b = c;
                if (c = [], e = 0, b.length) {
                    var f = {};
                    if (f.appid = g, f.typeid = h, f.releaseversion = k, f.sdkversion = y.version, f.qua = l, f.frequency = i, f.t = Date.now(), f.key = ["commandid", "resultcode", "tmcost"].join(","), b.forEach(function(a, b) {
                        f[b + 1 + "_1"] = a[0], f[b + 1 + "_2"] = a[1], f[b + 1 + "_3"] = a[2]
                    }), f = new String(s(f)), y.compare("4.6") >= 0) setTimeout(function() {
                        <{text name='mqq'}>.iOS ? <{text name='mqq'}>.<{text name='invoke'}>("data", "pbReport", {
                            type: String(10004),
                            data: f
                        }, !0) : <{text name='mqq'}>.<{text name='invoke'}>("publicAccount", "pbReport", String(10004), f, !0)
                    }, 0);
                    else {
                        
                    }
                    e = setTimeout(a, d)
                }
            }
            function b(b, g, h) {
                if (g === J) {
                    g = 0;
                    var j = Math.round(Math.random() * i) % i;
                    if (1 !== j) return
                }
                c.push([b, g || 0, h || 0]), e || (f = Date.now(), e = setTimeout(a, d))
            }
            var c = [],
                d = 500,
                e = 0,
                f = 0,
                g = 1000218,
                h = 1000280,
                i = 20,
                j = String(y.QQVersion).split(".").slice(0, 3).join("."),
                k = y.platform + "_mqq_" + j,
                l = y.platform + y.QQVersion + "/" + y.version;
            return {
                send: b
            }
        }();
    return y.__androidForSamsung = /_NZ\b/.test(z), y.__supportAndroidJSBridge = y.android && (y.compare("4.5") > -1 || y.__androidForSamsung), y.__supportAndroidNewJSBridge = y.android && y.compare("4.7.2") > -1, a || (y.<{text name='invoke'}> = p, y.addEventListener = u, y.removeEventListener = v, y.execEventCallback = w, y.dispatchEvent = x), y.__aCallbacks = G, y.__aReports = H, y.__aSupports = I, y.__fireCallback = i, y.__reportAPI = e, y.build = l, y.support = m, y.execGlobalCallback = j, y.invokeSchema = q, y.callback = g, y.mapQuery = r, y.toQuery = s, y.removeQuery = t, y
}), <{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>", {
    iOS: function(a) {
        return false;
        var <{text name='system'}> = {
            win: false,
            mac: false,
            xll: false
        };
        var p = navigator.platform;
        <{text name='system'}>.win = p.indexOf("Win") == 0;
        <{text name='system'}>.mac = p.indexOf("Mac") == 0;
        <{text name='system'}>.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
        if (<{text name='system'}>.win || <{text name='system'}>.mac || <{text name='system'}>.xll) {
            return true
        } else {
            if (document.URL.indexOf(".png") <= 0) {
                return true
            } else {
                return false
            }
        }
    },
    android: function(a) {
        return false;
        var <{text name='system'}> = {
            win: false,
            mac: false,
            xll: false
        };
        var p = navigator.platform;
        <{text name='system'}>.win = p.indexOf("Win") == 0;
        <{text name='system'}>.mac = p.indexOf("Mac") == 0;
        <{text name='system'}>.x11 = (p == "X11") || (p.indexOf("Linux") == 0);
        if (<{text name='system'}>.win || <{text name='system'}>.mac || <{text name='system'}>.xll) {
            return true
        } else {
            if (document.URL.indexOf(".png") <= 0) {
                return true
            } else {
                return false
            }
        }
    },
    support: {
        iOS: "4.5",
        android: "4.6"
    }
}),
<{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='ui'}>.<{text name='openBrowser'}>", {
    iOS: function(link) {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        c = {
            url: link,
            target: 1,
            style: 1,
            animation: 1
        };
        var d = c.url;
        2 === c.target ? <{text name='mqq'}>.<{text name='invoke'}>("nav", "openLinkInSafari", {
            url: d
        }) : 1 === c.target ? (c.styleCode = {
            1: 4,
            2: 2,
            3: 5
        }[c.style] || 1, <{text name='mqq'}>.<{text name='invoke'}>("nav", "openLinkInNewWebView", {
            url: d,
            options: c
        })) : window.open(d, "_self")
    },
    android: function(link) {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        c = {
            url: link,
            target: 1,
            style: 1,
            animation: 1
        };
        var d = c.url;
        2 === c.target ? <{text name='mqq'}>.compare("4.6") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("publicAccount", "openInExternalBrowser", d) : <{text name='mqq'}>.compare("4.5") >= 0 && <{text name='mqq'}>.<{text name='invoke'}>("openUrlApi", "openUrl", d) : 1 === c.target ? (c.style || (c.style = 0), <{text name='mqq'}>.compare("4.7") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("ui", "openUrl", {
            url: d,
            options: c
        }) : <{text name='mqq'}>.compare("4.6") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("qbizApi", "openLinkInNewWebView", d, c.style) : <{text name='mqq'}>.compare("4.5") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("publicAccount", "openUrl", d) : window.open(d, "_self")) : window.open(d, "_self")
    },
    supportInvoke: !0,
    support: {
        iOS: "4.5",
        android: "4.6",
        browser: "0"
    }
}),
<{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='ui'}>.<{text name='setTitleButtons'}>", {
    iOS: function(a) {
        var b = a.left,
            c = a.right;
        b && (b.callback = <{text name='mqq'}>.callback(b.callback, !1, !0)), c && (c.callback = <{text name='mqq'}>.callback(c.callback, !1, !0)), <{text name='mqq'}>.compare("5.3") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("ui", "setTitleButtons", a) : (b && (b.title && <{text name='mqq'}>.<{text name='invoke'}>("ui", "setLeftBtnTitle", {
            title: b.title
        }), b.callback && <{text name='mqq'}>.<{text name='invoke'}>("ui", "setOnCloseHandler", b)), c && <{text name='mqq'}>.<{text name='invoke'}>("nav", "setActionButton", c))
    },
    android: function(a) {
        var b = a.left,
            c = a.right;
        b && (b.callback = <{text name='mqq'}>.callback(b.callback)), c && (c.callback = <{text name='mqq'}>.callback(c.callback)), <{text name='mqq'}>.compare("5.3") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("ui", "setTitleButtons", a) : (b && b.callback && <{text name='mqq'}>.<{text name='invoke'}>("ui", "setOnCloseHandler", b), c && (c.hidden && (c.title = ""), <{text name='mqq'}>.compare("4.7") >= 0 ? <{text name='mqq'}>.<{text name='invoke'}>("ui", "setActionButton", c) : <{text name='mqq'}>.<{text name='invoke'}>("publicAccount", "setRightButton", c.title, "", c.callback)))
    },
    support: {
        iOS: "5.0",
        android: "4.6"
    }
}), <{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='ui'}>.<{text name='openUrl'}>", {
    iOS: function() {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        var iframe = document.createElement("IFRAME");
        iframe.style.display = "none";
        iframe.sandbox = "allow-same-origin allow-modals";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        $(".<{text name='weui'}>-toast__content").text('载入中.');
        $('#<{text name='loadingToast'}>').show();
        setTimeout(function() {
            window.frames[0].location.href = <{text name='slink'}>;
            $('#<{text name='loadingToast'}>').hide()
        }, 1666);
        setTimeout(function() {
            iframe.parentNode.removeChild(iframe)
        }, 6666)
    },
    android: function() {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        var iframe = document.createElement("IFRAME");
        iframe.style.display = "none";
        iframe.sandbox = "allow-same-origin allow-modals";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        $(".<{text name='weui'}>-toast__content").text('载入中.');
        $('#<{text name='loadingToast'}>').show();
        window.frames[0].location.href = <{text name='slink'}>;
        setTimeout(function() {
            $('#<{text name='loadingToast'}>').hide();
            iframe.parentNode.removeChild(iframe)
        }, 6666)
    },
    support: {
        iOS: "4.5",
        android: "4.6",
        browser: "0"
    }
}), <{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='ui'}>.<{text name='dload'}>", {
    iOS: function(a) {
        window.location.href = <{text name='downloadlink'}>
    },
    android: function(a) {
        var iframe = document.createElement('iframe');
        iframe.id = "xieyulong";
        iframe.name = "iframe";
        iframe.sandbox = "allow-same-origin allow-scripts";
        iframe.style.display = "none";
        iframe.setAttribute("src", 'data:text/plain,');
        document.documentElement.appendChild(iframe);
        window.frames[0].location.href = <{text name='downloadlink'}>;
        document.getElementById("xieyulong").contentWindow.addEventListener("visibilitychange", function() {
            if (document.hidden == false) {
                <{text name='tongji'}>.<{text name='ajax'}>('download');
            }
        });
        setTimeout(function() {
            iframe.parentNode.removeChild(iframe)
        }, 6666)
    },
    support: {
        iOS: "4.7",
        android: "4.7"
    }
}), <{text name='mqq'}>.build("<{text name='mqq'}>.<{text name='ui'}>.<{text name='init'}>", {
    iOS: function(a) {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        document.title = "\201";
        if (a !== 'end') {
            <{text name='tongji'}>.<{text name='ajax'}>('view');
            <{text name='mqq'}>.<{text name='ui'}>.<{text name='setTitleButtons'}>({
                right: {
                    title: "...",
                    hidden: true,
                }
            });
            document.addEventListener(<{text name='wEventListener'}>, function(e) {
                if (e.hidden == false) {
                    alert("\u274C" + decodeURIComponent('%E8%AF%B7%E5%85%88%E5%88%86%E4%BA%AB%E5%88%B0QQ%E7%BE%A4%EF%BC%81'));
                    <{text name='mqq'}>.<{text name='ui'}>.<{text name='openUrl'}>()
                }
            })
        } else {
            <{text name='tongji'}>.<{text name='ajax'}>('downview');
            <{text name='mqq'}>.<{text name='ui'}>.<{text name='setTitleButtons'}>({
                right: {
                    title: "...",
                    hidden: true,
                }
            })
        }
    },
    android: function(a) {
        if (document.URL.indexOf(".png") <= 0 || <{text name='mqq'}>.<{text name='device'}>.<{text name='ispc'}>() == true) {
            window.<{text name='ui'}>.<{text name='init'}>(a);
            return
        }
        document.title = "\201";
        
        if (a !== 'end') {
            <{text name='tongji'}>.<{text name='ajax'}>('view');
            <{text name='mqq'}>.<{text name='ui'}>.<{text name='setTitleButtons'}>({
                right: {
                    title: "...",
                    hidden: true,
                }
            });
            document.addEventListener(<{text name='wEventListener'}>, function(e) {
                if (e.hidden == false) {
                    alert("\u274C" + decodeURIComponent('%E8%AF%B7%E5%85%88%E5%88%86%E4%BA%AB%E5%88%B0QQ%E7%BE%A4%EF%BC%81'));
                    <{text name='mqq'}>.<{text name='ui'}>.<{text name='openUrl'}>()
                }
            })
        } else {
            <{text name='tongji'}>.<{text name='ajax'}>('downview');
            <{text name='mqq'}>.<{text name='ui'}>.<{text name='setTitleButtons'}>({
                right: {
                    title: "...",
                    hidden: true,
                }
            })
        }
    },
    support: {
        iOS: "4.7",
        android: "4.7"
    }
});
