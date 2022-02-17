<div class="account-sidebar"><a class="popup-btn">my account</a></div>
<div class="dashboard-left">
    <div class="collection-mobile-back"><span class="filter-back"><i class="fa fa-angle-left" aria-hidden="true"></i>
            back</span></div>
    <div class="block-content">
        <ul>
            <li class="active"><a href="{{ url('/dashboard') }}">Account Info</a></li>
            <li><a href="{{ route('customer.order') }}">My Orders</a></li>
            <li><a href="{{ url('/wishlist') }}">My Wishlist</a></li>
            <li><a href="{{ url('/profile') }}">Update Profile</a></li>
            <li><a href="{{ url('/password-change') }}">Change Password</a></li>
            <li class="last"><a href="{{ route('logout') }}">Log Out</a></li>
        </ul>
        <a href="{{ url('/vendor') }}" class=" btn btn-sm btn-solid">Become a Vendor</a>
    </div>
</div>