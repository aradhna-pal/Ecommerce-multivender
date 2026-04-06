const API_BASE = "https://api.workarya.com";
const USER_ORDERS = `${API_BASE}/api/orders/my-orders`;

document.addEventListener("DOMContentLoaded", loadOrders);

async function loadOrders() {
  const tableBody = document.getElementById("order-table-body");
  if (!tableBody) return;

  const token = localStorage.getItem("userToken");
  if (!token) {
    tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-danger">Login required</td></tr>`;
    return;
  }

  try {
    const res = await fetch(USER_ORDERS, {
      headers: { Authorization: `Bearer ${token}` },
    });

    const result = await res.json();

    if (!result.success || !result.orders?.length) {
      tableBody.innerHTML = `<tr><td colspan="7" class="text-center">No orders found</td></tr>`;
      return;
    }

    tableBody.innerHTML = "";

    result.orders.forEach((order) => {
      const firstItem = order.items?.[0];

      tableBody.innerHTML += `
            <tr>
                <td>#${order.orderId.slice(0, 8)}</td>
                <td>${firstItem?.productName || "No Product"}</td>
                <td>${formatDate(order.createdAt)}</td>
                <td><span class="${getStatusClass(order.orderStatus)}">${order.orderStatus}</span></td>
                <td>${order.paymentStatus}</td>
                <td>₹${order.finalAmount}</td>
                <td>
                  <a href="order-tracking.php?orderId=${order.orderId}" 
   class="nav-link logout-btn theme-bg-color text-light" style="padding: 5px 10px; font-size: 14px; border-radius: 5px;" >
   Track Order
</a>
                </td>
            </tr>`;
    });
  } catch (e) {
    tableBody.innerHTML = `<tr><td colspan="7" class="text-center text-danger">Error loading orders</td></tr>`;
  }
}

document.addEventListener("click", (e) => {
  if (e.target.classList.contains("track-order-btn")) {
    const id = e.target.dataset.id;
    window.location.href = `order-tracking.php?id=${id}`;
  }
});

function formatDate(d) {
  return new Date(d).toLocaleDateString("en-GB", {
    day: "2-digit",
    month: "short",
    year: "numeric",
  });
}

function getStatusClass(s) {
  s = s?.toUpperCase();
  if (["PLACED", "COMPLETED", "SUCCESS"].includes(s)) return "status-success";
  if (["CANCELED", "FAILED"].includes(s)) return "status-cancel";
  return "status-process";
}

// ********************************************************* user addrss ********************************************

{/* <div class="row g-sm-4 g-3" id="addressContainer">
    <!-- Address cards will be injected here -->
</div>

<script> */}
{/* <div class="row g-sm-4 g-3" id="addressContainer">
    <!-- Dynamic addresses will replace this content -->
</div>

<script> */}

const userToken = localStorage.getItem('userToken') || ''; 

async function loadAddresses() {
    const container = document.getElementById('addressContainer');
    container.innerHTML = `
        <div class="col-12 text-center py-5">
            <div class="spinner-border text-primary" role="status"></div>
            <p class="mt-3">Loading your addresses...</p>
        </div>`;

    if (!userToken) {
        container.innerHTML = `<p class="text-danger text-center">Please login to view addresses.</p>`;
        return;
    }

    try {
        const response = await fetch('https://api.workarya.com/api/address/list', {
            method: 'GET',
            headers: {
                'Content-Type': 'application/json',
                'Authorization': `Bearer ${userToken}`
            }
        });

        if (response.status === 401) {
            container.innerHTML = `<p class="text-danger text-center">Session expired. Please login again.</p>`;
            return;
        }

        if (!response.ok) throw new Error('Failed to load addresses');

        const addresses = await response.json();   // Your API returns direct array

        container.innerHTML = '';

        if (!addresses || addresses.length === 0) {
            container.innerHTML = `<p class="text-center">No addresses found. Add a new one.</p>`;
            return;
        }

        addresses.forEach((addr) => {
            const isChecked = addr.isDefault ? 'checked' : '';

            const fullAddress = `${addr.addressLine1}, ${addr.addressLine2 ? addr.addressLine2 + ', ' : ''}${addr.city}, ${addr.state}, ${addr.country}`;

            const addressHTML = `
                <div class="col-xxl-4 col-xl-6 col-lg-12 col-md-6">
                    <div class="address-box">
                        <div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="jack" 
                                       id="addr_${addr.id}" ${isChecked}>
                            </div>

                            <div class="label">
                                <label>${addr.addressType || 'Address'}</label>
                            </div>

                            <div class="table-responsive address-table">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td colspan="3">${addr.fullName}</td>
                                        </tr>
                                        <tr>
                                            <td>Address</td>
                                            <td>:</td>
                                            <td>
                                                <p>${fullAddress}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>Pin Code</td>
                                            <td>:</td>
                                            <td>${addr.postalCode}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone</td>
                                            <td>:</td>
                                            <td>${addr.phoneNumber}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <div class="button-group">
                            <button class="btn btn-sm add-button w-100 edit-btn" data-id="${addr.id}">
                                <i class="ri-edit-box-line"></i> Edit
                            </button>
                            <button class="btn btn-sm add-button w-100 delete-btn" data-id="${addr.id}">
                                <i class="ri-delete-bin-5-line"></i> Remove
                            </button>
                        </div>
                    </div>
                </div>
            `;

            container.innerHTML += addressHTML;
        });

        // Add event listeners for buttons
        addEventListeners();

    } catch (error) {
        console.error(error);
        container.innerHTML = `<p class="text-danger text-center">Failed to load addresses. Please try again later.</p>`;
    }
}

// Event listeners for Edit & Delete
function addEventListeners() {
    // Edit buttons
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const addressId = this.getAttribute('data-id');
            editAddress(addressId);
        });
    });

    // Delete buttons
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const addressId = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this address?')) {
                deleteAddress(addressId);
            }
        });
    });
}

// Edit function (you can open modal here)
function editAddress(id) {
    alert(`Edit Address - ID: ${id}`);
    // TODO: Open edit modal and pre-fill data
}

// Delete function
async function deleteAddress(id) {
    try {
        const response = await fetch(`https://api.workarya.com/api/address/delete/${id}`, {
            method: 'DELETE',
            headers: {
                'Authorization': `Bearer ${userToken}`
            }
        });

        if (response.ok) {
            loadAddresses(); // Refresh the list
        } else {
            alert('Failed to delete address');
        }
    } catch (err) {
        console.error(err);
        alert('Something went wrong');
    }
}

// Load addresses on page load
document.addEventListener('DOMContentLoaded', loadAddresses);






