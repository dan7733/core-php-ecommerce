<div id="toast-container"></div>
<?php
if (isset($Address_txtErro) && !empty($Address_txtErro)) {
    echo "<script>document.addEventListener('DOMContentLoaded', function() { showToast('{$Address_txtErro}', 'info'); });</script>";
}
?>

<style>
    :root { --deep-green: #0a5c36; }
    .form-dashboard-wrapper { padding: 20px; animation: fadeUp 0.5s ease-out forwards; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
    @keyframes fadeUp { from { opacity: 0; transform: translateY(20px); } to { opacity: 1; transform: translateY(0); } }
    .profile-card { background: #fff; border-radius: 16px; box-shadow: 0 5px 25px rgba(0,0,0,0.05); border: 1px solid #eaeaea; max-width: 600px; margin: 0 auto; overflow: hidden; }
    .profile-card-header { background-color: #f4f9f7; padding: 25px 30px; border-bottom: 2px solid #e8f5ed; display: flex; align-items: center; gap: 15px; }
    .profile-card-header i { font-size: 2.2rem; color: var(--deep-green); }
    .profile-card-header h4 { margin: 0; font-size: 1.8rem; font-weight: 800; color: #222; text-transform: uppercase; }
    .profile-card-body { padding: 35px 30px; }
    .modern-form-group { margin-bottom: 25px; }
    .modern-form-group label { display: block; font-size: 1.2rem; font-weight: 700; color: #555; margin-bottom: 8px; }
    .modern-input { width: 100%; padding: 15px 18px; font-size: 1.3rem; border: 2px solid #ddd; border-radius: 10px; transition: 0.3s; outline: none; color: #222; }
    .modern-input:focus { border-color: var(--deep-green); box-shadow: 0 0 0 4px rgba(10, 92, 54, 0.1); }
    .btn-save-profile { background: var(--deep-green); color: #fff; border: none; padding: 16px 30px; font-size: 1.4rem; font-weight: bold; border-radius: 10px; width: 100%; cursor: pointer; transition: 0.3s; display: flex; justify-content: center; align-items: center; gap: 10px; }
    .btn-save-profile:hover { background: #08492b; transform: translateY(-3px); box-shadow: 0 5px 15px rgba(10, 92, 54, 0.3); }
    
    /* Toast CSS */
    #toast-container { position: fixed; bottom: 30px; right: 30px; z-index: 9999; display: flex; flex-direction: column; gap: 10px; }
    .custom-toast { min-width: 320px; background: #fff; padding: 18px 25px; border-radius: 10px; box-shadow: 0 10px 30px rgba(0,0,0,0.15); font-size: 1.3rem; font-weight: 600; display: flex; align-items: center; gap: 15px; border-left: 6px solid #ff9800; transform: translateX(120%); transition: 0.4s cubic-bezier(0.68, -0.55, 0.265, 1.55); color: #333;}
    .custom-toast.show { transform: translateX(0); }
    .custom-toast i { font-size: 1.8rem; color: #ff9800; }
    
    @media (max-width: 768px) { .profile-card-header { padding: 20px; } .profile-card-header h4 { font-size: 1.5rem; } .profile-card-body { padding: 25px 20px; } .modern-input { font-size: 1.2rem; padding: 12px; } .btn-save-profile { font-size: 1.3rem; } }
</style>

<div class="form-dashboard-wrapper">
    <div class="profile-card">
        <div class="profile-card-header">
            <i class="fas fa-map-marked-alt"></i>
            <h4>Cập nhật địa chỉ</h4>
        </div>
        <div class="profile-card-body">
            <form method="post">
                <div class="modern-form-group">
                    <label for="newaddress">Địa chỉ mới của bạn</label>
                    <input type="text" name="diachimoi" class="modern-input" id="newaddress" placeholder="Ví dụ: 123 Đường Láng, Đống Đa, Hà Nội..." required minlength="10" maxlength="255">
                </div>
                <button type="submit" name="change-address-btn" class="btn-save-profile">
                    <i class="fas fa-save"></i> LƯU ĐỊA CHỈ
                </button>
            </form>
        </div>
    </div>
</div>

<script>
    function showToast(msg, type) {
        const c = document.getElementById('toast-container');
        if(!c) return;
        const t = document.createElement('div');
        t.className = `custom-toast ${type}`;
        t.innerHTML = `<i class="fas fa-info-circle"></i> <span>${msg}</span>`;
        c.appendChild(t);
        setTimeout(() => t.classList.add('show'), 10);
        setTimeout(() => { t.classList.remove('show'); setTimeout(() => t.remove(), 400); }, 3000);
    }
</script>