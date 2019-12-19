<aside class="left-sidebar">
         
          
            <!--Sidebar navigation-->
            <nav class="sidebar-nav">
              
                <ul id="sidebarnav"> 
                    @admin('super')     
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-account-multiple"></i><span class="hide-menu">User Management</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="{{ url('admin/show')}}">Admins</a></li>
                        <li><a href="{{ url('admin/roles')}}">Roles</a></li>
                    </ul>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-arrange-send-backward"></i><span class="hide-menu">Others</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="{{ url('admin/accounts')}}">Accounts</a></li>
                            <li>
                                <a class="has-arrow" href="#" aria-expanded="false">Menu 1.2</a>
                                <ul aria-expanded="false" class="collapse">
                                    <li><a href="#">item 1</a></li>
                                    <li><a href="#">item 2</a></li>
                                </ul>
                            </li>
                           
                        </ul>
                    </li>
                </li>
                <li>
                    <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cart"></i><span class="hide-menu">Puchase</span></a>
                    <ul aria-expanded="false" class="collapse">
                        <li><a href="#">Payment Entry</a></li>
                        <li><a href="#">Receipt Entry</a></li>
                        <li><a href="#">Contra Entry</a></li>     
                        <li><a href="#">Journal Entry</a></li>  
                        <li><a href="#">Debit Note Entry</a></li> 
                        <li><a href="#">Credit Note Entry</a></li>       
                        <li><a href="#">Ledger</a></li>                                
                    </ul>
                </li>
                @endadmin 
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-settings"></i>
                            <span class="hide-menu">Master</span></a>
                        <ul aria-expanded="false" class="collapse"> 
                            <li><a href="{{ url('admin/accounts')}}">Accounts</a></li>                             
                            <li><a href="{{ url('admin/item')}}">Items</a></li>   
                            <li><a href="{{ url('admin/place')}}">Place</a></li>
                            <li><a href="{{ url('admin/unit')}}">Unit</a></li>   
                            <li><a href="{{ url('admin/stockpoint')}}">Employee Details*</a></li>
                            <li><a href="{{ url('admin/stockpoint')}}">Vehicle Details*</a></li>
                            <li><a href="{{ url('admin/stockpoint')}}">Machinary Details*</a></li>
                            <li><a href="{{ url('admin/companies')}}">Our Company</a></li>   
                            
                        </ul>
                    </li>
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false">
                            <i class="mdi mdi-select-inverse"></i><span class="hide-menu">Purchase</span></a>
                        <ul aria-expanded="false" class="collapse"> 
                            <li><a href="{{ url('admin/knittedfabric')}}">Purchase</a></li> </ul>
                    </li> 
                    <li>
                        <a class="has-arrow waves-effect waves-dark" href="#" aria-expanded="false"><i class="mdi mdi-cached"></i><span class="hide-menu">Sales</span></a>
                        <ul aria-expanded="false" class="collapse">
                            <li><a href="#">Order Entry</a></li>
                            <li><a href="#">Invoice</a></li>
                            <li><a href="#">Excel - Auditor</a></li>  
                            <li><a href="#">Outstanding Report</a></li>                           
                        </ul>
                    </li>
                     
                   
                    
 
                    
                </ul>
            </nav>
            <!-- End Sidebar navigation -->
        </div>
        <!-- End Sidebar scroll-->
        <!-- Bottom points-->
        <div class="sidebar-footer">
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Settings"><i class="ti-settings"></i></a>
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Email"><i class="mdi mdi-gmail"></i></a>
            <!-- item-->
            <a href="" class="link" data-toggle="tooltip" title="Logout"><i class="mdi mdi-power"></i></a>
        </div>
        <!-- End Bottom points-->
    </aside>