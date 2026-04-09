// // Change Password Modal Integration
// document.addEventListener("DOMContentLoaded", () => {
//   // Insert modals HTML into the DOM
//   const modalsHTML = `
//   <!-- Change Password Modal -->
//   <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
//     <div class="modal-dialog modal-md">
//       <div class="modal-content">
//         <div class="modal-header gradient-bg text-dark">
//           <h5 class="modal-title" id="changePasswordModalLabel">
//             <i class="fas fa-key me-2"></i>Change Password
//           </h5>
//           <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
//         </div>
//         <div class="modal-body">
//           <form id="changePasswordForm">
//             <div class="mb-3 position-relative">
//               <label for="oldPassword" class="form-label">Old Password <span class="text-danger">*</span></label>
//               <div class="input-group">
//                 <input type="password" class="form-control" id="oldPassword" placeholder="Enter your current password" required />
//                 <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
//                   <i class="fas fa-eye"></i>
//                 </button>
//               </div>
//             </div>
//             <div class="mb-3">
//               <label for="newPassword" class="form-label">New Password <span class="text-danger">*</span></label>
//               <div class="input-group">
//                 <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" required minlength="8" />
//                 <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
//                   <i class="fas fa-eye"></i>
//                 </button>
//               </div>
//               <small class="text-muted">Password must be at least 8 characters long</small>
//             </div>
//             <div class="mb-3">
//               <label for="confirmPassword" class="form-label">Confirm New Password <span class="text-danger">*</span></label>
//               <div class="input-group">
//                 <input type="password" class="form-control" id="confirmPassword" placeholder="Re-enter new password" required />
//                 <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
//                   <i class="fas fa-eye"></i>
//                 </button>
//               </div>
//             </div>
//             <div class="text-end">
//               <a href="#" id="forgotPasswordLink" class="text-primary small">Forgot Password?</a>
//             </div>
//           </form>
//         </div>
//         <div class="modal-footer">
//           <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
//             <i class="fas fa-times me-1"></i>Cancel
//           </button>
//           <button type="submit" class="btn btn-primary" form="changePasswordForm">
//             <i class="fas fa-check me-1"></i>Update Password
//           </button>
//         </div>
//       </div>
//     </div>
//   </div>

//   <!-- Password Recovery Modal -->
//   <div class="modal fade" id="passwordRecoveryModal" tabindex="-1" aria-labelledby="passwordRecoveryLabel" aria-hidden="true">
//     <div class="modal-dialog modal-md">
//       <div class="modal-content">
//         <div class="modal-header gradient-bg text-white">
//           <h5 class="modal-title" id="passwordRecoveryLabel">
//             <i class="fas fa-unlock-alt me-2"></i>Password Recovery
//           </h5>
//           <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
//         </div>
//         <div class="modal-body">
//           <!-- Step 1: Phone -->
//           <form id="passwordRecoveryForm">
//             <div id="stepPhone">
//               <p class="text-muted mb-3">Enter your registered phone number to receive an OTP</p>
//               <label for="recoveryPhone" class="form-label">Phone Number <span class="text-danger">*</span></label>
//               <div class="input-group mb-3">
//                 <span class="input-group-text"><i class="fas fa-phone"></i></span>
//                 <input type="tel" id="recoveryPhone" class="form-control" placeholder="e.g. 9876543210" required pattern="[0-9]{10}" maxlength="10" />
//               </div>
//               <button type="button" class="btn btn-primary w-100" id="sendOtpBtn">
//                 <i class="fas fa-paper-plane me-2"></i>Send OTP
//               </button>
//             </div>

//             <!-- Step 2: OTP -->
//             <div id="stepOtp" class="d-none">
//               <div class="alert alert-info">
//                 <i class="fas fa-info-circle me-2"></i>OTP has been sent to your registered phone number
//               </div>
//               <label for="recoveryOtp" class="form-label">Enter OTP <span class="text-danger">*</span></label>
//               <div class="input-group mb-3">
//                 <span class="input-group-text"><i class="fas fa-lock"></i></span>
//                 <input type="number" id="recoveryOtp" class="form-control" placeholder="Enter the 6-digit OTP" required maxlength="6" />
//               </div>
//               <div class="d-flex justify-content-between mb-3">
//                 <button type="button" class="btn btn-link text-primary p-0" id="resendOtpBtn">
//                   <i class="fas fa-redo me-1"></i>Resend OTP
//                 </button>
//                 <span class="text-muted small">Time remaining: <span id="otpTimer">60s</span></span>
//               </div>
//               <button type="button" class="btn btn-primary w-100" id="verifyOtpBtn">
//                 <i class="fas fa-check-circle me-2"></i>Verify OTP
//               </button>
//             </div>

//             <!-- Step 3: New Password -->
//             <div id="stepNewPassword" class="d-none">
//               <div class="alert alert-success">
//                 <i class="fas fa-check-circle me-2"></i>OTP verified successfully! Now set your new password.
//               </div>
//               <label for="newRecoveryPassword" class="form-label">New Password <span class="text-danger">*</span></label>
//               <div class="input-group mb-3">
//                 <span class="input-group-text"><i class="fas fa-key"></i></span>
//                 <input type="password" id="newRecoveryPassword" class="form-control" placeholder="Enter new password" required minlength="8" />
//                 <button class="btn btn-outline-secondary" type="button" id="toggleRecoveryPassword">
//                   <i class="fas fa-eye"></i>
//                 </button>
//               </div>

//               <label for="confirmRecoveryPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
//               <div class="input-group mb-3">
//                 <span class="input-group-text"><i class="fas fa-key"></i></span>
//                 <input type="password" id="confirmRecoveryPassword" class="form-control" placeholder="Re-enter password" required />
//                 <button class="btn btn-outline-secondary" type="button" id="toggleConfirmRecoveryPassword">
//                   <i class="fas fa-eye"></i>
//                 </button>
//               </div>

//               <button type="submit" class="btn btn-success w-100">
//                 <i class="fas fa-save me-2"></i>Update Password
//               </button>
//             </div>
//           </form>
//         </div>
//       </div>
//     </div>
//   </div>`;

//   // Insert modals at the end of body
//   document.body.insertAdjacentHTML("beforeend", modalsHTML);

//   // Password visibility toggle functions
//   function setupPasswordToggle(buttonId, inputId) {
//     const button = document.getElementById(buttonId);
//     const input = document.getElementById(inputId);
//     if (button && input) {
//       button.addEventListener("click", () => {
//         const icon = button.querySelector("i");
//         if (input.type === "password") {
//           input.type = "text";
//           icon.classList.remove("fa-eye");
//           icon.classList.add("fa-eye-slash");
//         } else {
//           input.type = "password";
//           icon.classList.remove("fa-eye-slash");
//           icon.classList.add("fa-eye");
//         }
//       });
//     }
//   }

//   // Setup all password toggles
//   setupPasswordToggle("toggleOldPassword", "oldPassword");
//   setupPasswordToggle("toggleNewPassword", "newPassword");
//   setupPasswordToggle("toggleConfirmPassword", "confirmPassword");
//   setupPasswordToggle("toggleRecoveryPassword", "newRecoveryPassword");
//   setupPasswordToggle("toggleConfirmRecoveryPassword", "confirmRecoveryPassword");

//   // Handle Change Password Form Submission
//   document.getElementById("changePasswordForm").addEventListener("submit", (e) => {
//     e.preventDefault();
    
//     const oldPassword = document.getElementById("oldPassword").value;
//     const newPassword = document.getElementById("newPassword").value;
//     const confirmPassword = document.getElementById("confirmPassword").value;

//     // Validation
//     if (newPassword !== confirmPassword) {
//       alert("New passwords do not match!");
//       return;
//     }

//     if (newPassword.length < 8) {
//       alert("Password must be at least 8 characters long!");
//       return;
//     }

//     if (oldPassword === newPassword) {
//       alert("New password must be different from old password!");
//       return;
//     }

//     // Send to backend API
//     fetch('/admin/change-password', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//       },
//       body: JSON.stringify({
//         old_password: oldPassword,
//         new_password: newPassword,
//         new_password_confirmation: confirmPassword
//       })
//     })
//     .then(response => response.json())
//     .then(data => {
//       if (data.success) {
//         alert(data.message || "Password changed successfully!");
//         const modal = bootstrap.Modal.getInstance(document.getElementById("changePasswordModal"));
//         modal.hide();
//         document.getElementById("changePasswordForm").reset();
//       } else {
//         alert(data.message || "Failed to change password!");
//       }
//     })
//     .catch(error => {
//       console.error('Error:', error);
//       alert("An error occurred. Please try again.");
//     });
//   });

//   // Trigger Forgot Password Modal
//   // document.body.addEventListener("click", (e) => {
//   //   if (e.target.id === "forgotPasswordLink") {
//   //     e.preventDefault();
//   //     const oldModal = bootstrap.Modal.getInstance(document.getElementById("changePasswordModal"));
//   //     if (oldModal) oldModal.hide();

//   //     setTimeout(() => {
//   //       const recoveryModal = new bootstrap.Modal(document.getElementById("passwordRecoveryModal"));
//   //       recoveryModal.show();
//   //     }, 400);
//   //   }
//   // });

//   // OTP Timer
//   // let otpTimerInterval;
//   // function startOtpTimer(duration) {
//   //   let timeLeft = duration;
//   //   const timerElement = document.getElementById("otpTimer");
//   //   const resendBtn = document.getElementById("resendOtpBtn");
    
//   //   resendBtn.disabled = true;
    
//   //   otpTimerInterval = setInterval(() => {
//   //     timeLeft--;
//   //     timerElement.textContent = timeLeft + "s";
      
//   //     if (timeLeft <= 0) {
//   //       clearInterval(otpTimerInterval);
//   //       timerElement.textContent = "0s";
//   //       resendBtn.disabled = false;
//   //     }
//   //   }, 1000);
//   // }

//   // Handle Send OTP
//   // document.getElementById("sendOtpBtn").addEventListener("click", () => {
//   //   const phone = document.getElementById("recoveryPhone").value.trim();
    
//   //   if (phone.length !== 10 || !/^\d+$/.test(phone)) {
//   //     alert("Please enter a valid 10-digit phone number.");
//   //     return;
//   //   }

//   //   // Send OTP to backend
//   //   fetch('/admin/send-recovery-otp', {
//   //     method: 'POST',
//   //     headers: {
//   //       'Content-Type': 'application/json',
//   //       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//   //     },
//   //     body: JSON.stringify({ phone: phone })
//   //   })
//   //   .then(response => response.json())
//   //   .then(data => {
//   //     if (data.success) {
//   //       alert(data.message || "OTP sent to " + phone);
//   //       document.getElementById("stepPhone").classList.add("d-none");
//   //       document.getElementById("stepOtp").classList.remove("d-none");
//   //       startOtpTimer(60);
//   //     } else {
//   //       alert(data.message || "Failed to send OTP");
//   //     }
//   //   })
//   //   .catch(error => {
//   //     console.error('Error:', error);
//   //     alert("An error occurred. Please try again.");
//   //   });
//   // });

//   // // Handle Resend OTP
//   // document.getElementById("resendOtpBtn").addEventListener("click", () => {
//   //   const phone = document.getElementById("recoveryPhone").value.trim();
    
//   //   // TODO: Backend API call
//   //   alert("OTP resent to " + phone);
//   //   startOtpTimer(60);
//   // });

//   // // Handle Verify OTP
//   // document.getElementById("verifyOtpBtn").addEventListener("click", () => {
//   //   const otp = document.getElementById("recoveryOtp").value.trim();
    
//   //   if (otp.length < 4) {
//   //     alert("Invalid OTP. Please enter a valid OTP.");
//   //     return;
//   //   }

//   //   // Verify OTP with backend
//   //   fetch('/admin/verify-recovery-otp', {
//   //     method: 'POST',
//   //     headers: {
//   //       'Content-Type': 'application/json',
//   //       'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//   //     },
//   //     body: JSON.stringify({ 
//   //       phone: document.getElementById("recoveryPhone").value,
//   //       otp: otp 
//   //     })
//   //   })
//   //   .then(response => response.json())
//   //   .then(data => {
//   //     if (data.success) {
//   //       alert(data.message || "OTP verified!");
//   //       clearInterval(otpTimerInterval);
//   //       document.getElementById("stepOtp").classList.add("d-none");
//   //       document.getElementById("stepNewPassword").classList.remove("d-none");
//   //     } else {
//   //       alert(data.message || "Invalid OTP");
//   //     }
//   //   })
//   //   .catch(error => {
//   //     console.error('Error:', error);
//   //     alert("An error occurred. Please try again.");
//   //   });
//   // });

//   // Submit New Password (Recovery)
//   document.getElementById("passwordRecoveryForm").addEventListener("submit", (e) => {
//     e.preventDefault();
    
//     const newPass = document.getElementById("newRecoveryPassword").value;
//     const confirmPass = document.getElementById("confirmRecoveryPassword").value;

//     if (newPass !== confirmPass) {
//       alert("Passwords do not match!");
//       return;
//     }

//     if (newPass.length < 8) {
//       alert("Password must be at least 8 characters long!");
//       return;
//     }

//     // Send password update to backend
//     fetch('/admin/reset-password', {
//       method: 'POST',
//       headers: {
//         'Content-Type': 'application/json',
//         'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content
//       },
//       body: JSON.stringify({
//         phone: document.getElementById("recoveryPhone").value,
//         password: newPass,
//         password_confirmation: confirmPass
//       })
//     })
//     .then(response => response.json())
//     .then(data => {
//       if (data.success) {
//         alert(data.message || "Password updated successfully!");
//         const recoveryModal = bootstrap.Modal.getInstance(document.getElementById("passwordRecoveryModal"));
//         recoveryModal.hide();
//         // Reset form
//         document.getElementById("passwordRecoveryForm").reset();
//         document.getElementById("stepNewPassword").classList.add("d-none");
//         document.getElementById("stepPhone").classList.remove("d-none");
//       } else {
//         alert(data.message || "Failed to update password");
//       }
//     })
//     .catch(error => {
//       console.error('Error:', error);
//       alert("An error occurred. Please try again.");
//     });
//   });

//   // Reset recovery modal on close
//   document.getElementById("passwordRecoveryModal").addEventListener("hidden.bs.modal", () => {
//     clearInterval(otpTimerInterval);
//     document.getElementById("passwordRecoveryForm").reset();
//     document.getElementById("stepOtp").classList.add("d-none");
//     document.getElementById("stepNewPassword").classList.add("d-none");
//     document.getElementById("stepPhone").classList.remove("d-none");
//   });
// });

// // Global function to open Change Password Modal
// function openChangePasswordModal() {
//   const modal = new bootstrap.Modal(document.getElementById("changePasswordModal"));
//   modal.show();
// }

// // Allow opening modal via navbar/sidebar button
// document.addEventListener("DOMContentLoaded", () => {
//   // Listen for any button with data-action="change-password"
//   document.body.addEventListener("click", (e) => {
//     const target = e.target.closest('[data-action="change-password"]');
//     if (target) {
//       e.preventDefault();
//       openChangePasswordModal();
//     }
//   });
// });

document.addEventListener("DOMContentLoaded", () => {
  // Insert Change Password Modal HTML
  const modalHTML = `
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Admin Panel</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
</head>

  <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md">
      <div class="modal-content">
        <div class="modal-header gradient-bg text-dark">
          <h5 class="modal-title" id="changePasswordModalLabel">
            <i class="fas fa-key me-2"></i>Change Password
          </h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <form id="changePasswordForm">
            <div class="mb-3 position-relative">
              <label for="oldPassword" class="form-label">Old Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control" id="oldPassword" placeholder="Enter current password" required />
                <button class="btn btn-outline-secondary" type="button" id="toggleOldPassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>

            <div class="mb-3">
              <label for="newPassword" class="form-label">New Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control" id="newPassword" placeholder="Enter new password" required minlength="8" />
                <button class="btn btn-outline-secondary" type="button" id="toggleNewPassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>

            <div class="mb-3">
              <label for="confirmPassword" class="form-label">Confirm Password <span class="text-danger">*</span></label>
              <div class="input-group">
                <input type="password" class="form-control" id="confirmPassword" placeholder="Re-enter new password" required />
                <button class="btn btn-outline-secondary" type="button" id="toggleConfirmPassword">
                  <i class="fas fa-eye"></i>
                </button>
              </div>
            </div>
          </form>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
            <i class="fas fa-times me-1"></i>Cancel
          </button>
          <button type="submit" class="btn btn-primary" form="changePasswordForm">
            <i class="fas fa-check me-1"></i>Update Password
          </button>
        </div>
      </div>
    </div>
  </div>`;

  // Add modal to DOM
  document.body.insertAdjacentHTML("beforeend", modalHTML);

  // 🧠 Ensure event binding happens AFTER modal is added
  const form = document.getElementById("changePasswordForm");

  // Password visibility toggle
  function setupPasswordToggle(btnId, inputId) {
    const btn = document.getElementById(btnId);
    const input = document.getElementById(inputId);
    if (btn && input) {
      btn.addEventListener("click", () => {
        const icon = btn.querySelector("i");
        if (input.type === "password") {
          input.type = "text";
          icon.classList.replace("fa-eye", "fa-eye-slash");
        } else {
          input.type = "password";
          icon.classList.replace("fa-eye-slash", "fa-eye");
        }
      });
    }
  }

  setupPasswordToggle("toggleOldPassword", "oldPassword");
  setupPasswordToggle("toggleNewPassword", "newPassword");
  setupPasswordToggle("toggleConfirmPassword", "confirmPassword");

  // 🧩 Handle form submission
  form.addEventListener("submit", (e) => {
    e.preventDefault();
    console.log("Submit button clicked ✅");

    const oldPassword = document.getElementById("oldPassword").value.trim();
    const newPassword = document.getElementById("newPassword").value.trim();
    const confirmPassword = document.getElementById("confirmPassword").value.trim();

    if (newPassword !== confirmPassword) return alert("Passwords do not match!");
    if (newPassword.length < 8) return alert("Password must be at least 8 characters!");
    if (oldPassword === newPassword) return alert("New password must differ from old!");

    fetch("/admin/change-password", {
      method: "POST",
      headers: {
        "Content-Type": "application/json",
        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').content,
      },
      body: JSON.stringify({
        old_password: oldPassword,
        new_password: newPassword,
        new_password_confirmation: confirmPassword,
      }),
    })
      .then((res) => res.json())
      .then((data) => {
        if (data.success) {
          alert(data.message || "Password changed successfully!");
          const modal = bootstrap.Modal.getInstance(document.getElementById("changePasswordModal"));
          modal.hide();
          form.reset();
        } else {
          alert(data.message || "Failed to change password!");
        }
      })
      .catch((err) => {
        console.error("Error:", err);
        alert("An error occurred. Please try again.");
      });
  });

  // 🧩 Allow opening modal with data-action="change-password"
  document.body.addEventListener("click", (e) => {
    const target = e.target.closest('[data-action="change-password"]');
    if (target) {
      e.preventDefault();
      const modal = new bootstrap.Modal(document.getElementById("changePasswordModal"));
      modal.show();
    }
  });
});

