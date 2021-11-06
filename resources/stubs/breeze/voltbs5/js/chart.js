import Chartist from "chartist";
import tooltip from "chartist-plugin-tooltips";
("use strict");
const d = document;
if (d.querySelector(".ct-chart-sales-value")) {
    //Chart 5
    new Chartist.Line(
        ".ct-chart-sales-value",
        {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat", "Sun"],
            series: [[0, 10, 30, 40, 80, 60, 100]],
        },
        {
            low: 0,
            showArea: true,
            fullWidth: true,
            plugins: [Chartist.plugins.tooltip()],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: "end",
                showGrid: true,
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                labelInterpolationFnc: function (value) {
                    return "$" + value / 1 + "k";
                },
            },
        }
    );
}

if (d.querySelector(".ct-chart-ranking")) {
    var chart = new Chartist.Bar(
        ".ct-chart-ranking",
        {
            labels: ["Mon", "Tue", "Wed", "Thu", "Fri", "Sat"],
            series: [
                [1, 5, 2, 5, 4, 3],
                [2, 3, 4, 8, 1, 2],
            ],
        },
        {
            low: 0,
            showArea: true,
            plugins: [Chartist.plugins.tooltip()],
            axisX: {
                // On the x-axis start means top and end means bottom
                position: "end",
            },
            axisY: {
                // On the y-axis start means left and end means right
                showGrid: false,
                showLabel: false,
                offset: 0,
            },
        }
    );

    chart.on("draw", function (data) {
        if (data.type === "line" || data.type === "area") {
            data.element.animate({
                d: {
                    begin: 2000 * data.index,
                    dur: 2000,
                    from: data.path
                        .clone()
                        .scale(1, 0)
                        .translate(0, data.chartRect.height())
                        .stringify(),
                    to: data.path.clone().stringify(),
                    easing: Chartist.Svg.Easing.easeOutQuint,
                },
            });
        }
    });
}
