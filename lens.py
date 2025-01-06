import numpy as np
import plotly.graph_objects as go
import dash
from dash import dcc, html
from dash.dependencies import Input, Output

# تعريف القيم الافتراضية العالمية
DEFAULT_VALUES = {
    'center_thickness': 1.0,  # السمك المركزي الافتراضي
    'min_thickness': 0.5,     # الحد الأدنى للسمك
    'resolution': 150         # دقة الشبكة
}

# خصائص المواد
MATERIAL_PROPERTIES = {
    'CR-39': {'index': 1.498, 'abbe': 58},
    'Polycarbonate': {'index': 1.586, 'abbe': 30},
    'High-Index 1.67': {'index': 1.67, 'abbe': 32},
    'High-Index 1.74': {'index': 1.74, 'abbe': 33}
}

# إعداد التطبيق
def initialize_app():
    app = dash.Dash(__name__)
    app.layout = html.Div([
        dcc.Input(id="sphere_power", type="number", placeholder="أدخل قوة العدسة الكروية"),
        dcc.Input(id="cylinder_power", type="number", placeholder="أدخل قوة الأسطوانة"),
        dcc.Input(id="cylinder_axis", type="number", placeholder="أدخل محور الأسطوانة"),
        dcc.Input(id="diameter", type="number", placeholder="أدخل القطر (مم)"),
        dcc.Dropdown(
            id="material_type",
            options=[{'label': key, 'value': key} for key in MATERIAL_PROPERTIES.keys()],
            placeholder="اختر نوع المادة"
        ),
        dcc.Input(id="base_curve", type="number", placeholder="أدخل المنحنى الأساسي"),
        dcc.Input(id="center_thickness", type="number", placeholder="أدخل السمك المركزي"),
        html.Button("احسب", id="calculate_button", n_clicks=0),
        dcc.Graph(id="lens_plot"),
        html.Div(id="thickness_info")
    ])
    return app

def calculate_lens_thickness(sphere_power, cylinder_power, diameter, refractive_index, base_curve, cylinder_axis, center_thickness=DEFAULT_VALUES['center_thickness']):
    """حساب سمك العدسة مع مراعاة العوامل المختلفة"""
    try:
        # التحقق من المدخلات
        if not all(isinstance(x, (int, float)) for x in [sphere_power, cylinder_power, diameter, refractive_index, base_curve]):
            raise ValueError("جميع المدخلات يجب أن تكون أرقاماً")
        if diameter <= 0 or base_curve <= 0:
            raise ValueError("القطر والمنحنى الأساسي يجب أن يكونا أكبر من الصفر")

        # حساب نصف قطر الانحناء الأساسي
        base_curve_radius = 1000 / base_curve if base_curve != 0 else float('inf')
        
        # حساب معامل التصحيح للانكسار
        power_factor = 1 / (refractive_index - 1)

        # حساب السمك المركزي المعدل
        adjusted_center_thickness = center_thickness + (0.1 * abs(sphere_power))

        # تأثير محور الأسطوانة
        cyl_axis_factor = np.cos(np.radians(cylinder_axis)) if cylinder_axis is not None else 1

        # حساب منحنى السطح الخلفي
        back_curve = base_curve + sphere_power
        back_radius = 1000 / back_curve if back_curve != 0 else float('inf')

        # حساب السمك الأساسي
        edge_thickness = adjusted_center_thickness + \
                         (sphere_power * power_factor * (diameter ** 2)) / 8

        # تصحيح للقوة الأسطوانية
        if cylinder_power != 0:
            cyl_correction = (cylinder_power * power_factor * (diameter ** 2) * cyl_axis_factor) / 16
            edge_thickness += cyl_correction

        # تطبيق الحد الأدنى للسمك
        return max(edge_thickness, DEFAULT_VALUES['min_thickness'])
    
    except Exception as e:
        print(f"خطأ في حساب سمك العدسة: {str(e)}")
        return DEFAULT_VALUES['min_thickness']

def create_lens_visualization(x, y, z_front, z_back, thickness):
    """إنشاء الرسم البياني للعدسة"""
    try:
        fig = go.Figure()

        # إضافة السطح الأمامي
        fig.add_surface(
            x=x, y=y, z=z_front,
            colorscale='Blues',
            opacity=0.7,
            name="السطح الأمامي",
            showscale=False
        )

        # إضافة السطح الخلفي
        fig.add_surface(
            x=x, y=y, z=z_back,
            colorscale='Reds',
            opacity=0.7,
            name="السطح الخلفي",
            showscale=False
        )

        # تحديث تخطيط الرسم
        fig.update_layout(
            title=f"شكل العدسة ثلاثي الأبعاد (السمك: {thickness:.2f} مم)",
            scene=dict(
                xaxis_title="العرض (مم)",
                yaxis_title="العمق (مم)",
                zaxis_title="السمك (مم)",
                camera=dict(
                    up=dict(x=0, y=0, z=1),
                    center=dict(x=0, y=0, z=0),
                    eye=dict(x=1.5, y=1.5, z=1.5)
                )
            ),
            template="plotly_white"
        )

        return fig
    
    except Exception as e:
        print(f"خطأ في إنشاء الرسم البياني: {str(e)}")
        return go.Figure()

# تحسين الكود الخاص بتحديث الرسم البياني
def register_callbacks(app):
    @app.callback(
        [Output("lens_plot", "figure"), Output("thickness_info", "children")],
        [Input("calculate_button", "n_clicks")],
        [Input("sphere_power", "value"),
         Input("cylinder_power", "value"),
         Input("cylinder_axis", "value"),
         Input("diameter", "value"),
         Input("material_type", "value"),
         Input("base_curve", "value"),
         Input("center_thickness", "value")]
    )
    def update_graph(n_clicks, sphere_power, cylinder_power, cylinder_axis, diameter, material_type, base_curve, center_thickness):
        if n_clicks > 0:
            try:
                # الحصول على معامل الانكسار من نوع المادة
                refractive_index = MATERIAL_PROPERTIES[material_type]['index']

                # حساب سمك العدسة
                thickness = calculate_lens_thickness(sphere_power, cylinder_power, diameter, refractive_index, base_curve, cylinder_axis, center_thickness)

                # إنشاء شبكة من القيم x و y
                x = np.linspace(-diameter / 2, diameter / 2, DEFAULT_VALUES['resolution'])
                y = np.linspace(-diameter / 2, diameter / 2, DEFAULT_VALUES['resolution'])
                x, y = np.meshgrid(x, y)

                # حساب القيم z للوجه الأمامي والخلفي
                z_front = np.sqrt((1000 / base_curve) ** 2 - (x ** 2 + y ** 2)) - (1000 / base_curve - thickness)
                z_back = -np.sqrt((diameter / 2) ** 2 - (x ** 2 + y ** 2)) + (diameter / 2 - thickness)

                # إنشاء الرسم البياني
                fig = create_lens_visualization(x, y, z_front, z_back, thickness)

                # معلومات السمك
                thickness_info = f"""
                    السمك المركزي: {thickness:.2f} مم<br>
                    المنحنى الأساسي: {base_curve} D<br>
                    معامل الانكسار: {refractive_index}
                """

                return fig, thickness_info
            except Exception as e:
                return go.Figure(), f"خطأ في الحساب: {str(e)}"
        else:
            return go.Figure(), ""

# تشغيل التطبيق
if __name__ == "__main__":
    app = initialize_app()
    register_callbacks(app)
    app.run_server(debug=True)
