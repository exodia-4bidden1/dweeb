        // Set minimum date to today
        document.getElementById('borrowDate').min = new Date().toISOString().split('T')[0];

        // Handle purpose dropdown change
        document.getElementById('purpose').addEventListener('change', function() {
            const otherContainer = document.getElementById('otherPurposeContainer');
            const otherTextarea = document.getElementById('otherPurpose');
            
            if (this.value === 'Others') {
                otherContainer.classList.add('show');
                otherTextarea.required = true;
            } else {
                otherContainer.classList.remove('show');
                otherTextarea.required = false;
                otherTextarea.value = '';
            }
        });

        // Handle time selection validation
        document.getElementById('startTime').addEventListener('change', updateEndTimeOptions);
        document.getElementById('endTime').addEventListener('change', validateTimeSelection);

        function updateEndTimeOptions() {
            const startTime = document.getElementById('startTime').value;
            const endTimeSelect = document.getElementById('endTime');
            const currentEndTime = endTimeSelect.value;
            
            // Clear current end time options
            endTimeSelect.innerHTML = '<option value="">Select end time...</option>';
            
            if (startTime) {
                const startHour = parseInt(startTime.split(':')[0]);
                const timeOptions = [
                    { value: '02:00', text: '2:00 AM', hour: 2 },
                    { value: '03:00', text: '3:00 AM', hour: 3 },
                    { value: '04:00', text: '4:00 AM', hour: 4 },
                    { value: '05:00', text: '5:00 AM', hour: 5 }
                ];
                
                timeOptions.forEach(option => {
                    if (option.hour > startHour) {
                        const optionElement = document.createElement('option');
                        optionElement.value = option.value;
                        optionElement.textContent = option.text;
                        endTimeSelect.appendChild(optionElement);
                    }
                });
            }
        }

        function validateTimeSelection() {
            const startTime = document.getElementById('startTime').value;
            const endTime = document.getElementById('endTime').value;
            
            if (startTime && endTime) {
                const startHour = parseInt(startTime.split(':')[0]);
                const endHour = parseInt(endTime.split(':')[0]);
                
                if (endHour <= startHour) {
                    alert('End time must be after start time.');
                    document.getElementById('endTime').value = '';
                }
            }
        }

        function openModal() {
            document.getElementById('modalOverlay').style.display = 'flex';
            document.body.style.overflow = 'hidden';
        }

        function closeModal() {
            document.getElementById('modalOverlay').style.display = 'none';
            document.body.style.overflow = 'auto';
            
            // Reset form
            document.getElementById('reservationForm').reset();
            document.getElementById('otherPurposeContainer').classList.remove('show');
            document.getElementById('successMessage').style.display = 'none';
            document.getElementById('otherPurpose').required = false;
            updateEndTimeOptions();
        }

        function submitReservation() {
            const form = document.getElementById('reservationForm');
            const submitBtn = document.getElementById('submitBtn');
            
            if (form.checkValidity()) {
                // Disable submit button
                submitBtn.disabled = true;
                submitBtn.textContent = 'Submitting...';
                
                // Simulate API call
                setTimeout(() => {
                    document.getElementById('successMessage').style.display = 'block';
                    
                    // Hide form and show success message
                    setTimeout(() => {
                        closeModal();
                        submitBtn.disabled = false;
                        submitBtn.textContent = 'Submit Reservation';
                    }, 2000);
                }, 1000);
            } else {
                form.reportValidity();
            }
        }

        // Close modal when clicking outside
        document.getElementById('modalOverlay').addEventListener('click', function(e) {
            if (e.target === this) {
                closeModal();
            }
        });

        // Handle Escape key
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Escape' && document.getElementById('modalOverlay').style.display === 'flex') {
                closeModal();
            }
        });