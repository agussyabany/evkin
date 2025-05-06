<!-- Bottom Navigation -->
<div class="bottom-navi">
    <div class="navi-content">
        <a href="/perumdam" class="navi-item {{ request()->is('perumdam') ? 'active' : '' }}">
            <i class="fas fa-home"></i>
        </a>
        <a href="/mKeuangan" class="navi-item {{ request()->is('mKeuangan') ? 'active' : '' }}">
            <i class="fas fa-money-bill"></i>
        </a>
        <a href="/mOperasional" class="navi-item {{ request()->is('mOperasional') ? 'active' : '' }}">
            <i class="fas fa-cogs"></i>
        </a>
        <a href="/mPelayanan" class="navi-item {{ request()->is('mPelayanan') ? 'active' : '' }}">
            <i class="fas fa-handshake"></i>
        </a>
        <a href="/mSdmkin" class="navi-item {{ request()->is('mSdmkin') ? 'active' : '' }}">
            <i class="fas fa-users"></i>
        </a>
        
    </div>
  </div>