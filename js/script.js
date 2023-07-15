// Toggle Hamburger
$(document).ready(function() {
    $('.hamburger').click(function() {
        $('.left-nav').toggleClass('show');
        $('.overlay').toggleClass('show');
    });
});

document.addEventListener('DOMContentLoaded', function() {
    var cancelButton = document.querySelector('.cancel-button');
    var popupContainer = document.querySelector('.AddContainer');
    var showCheckbox = document.getElementById('show');
  
    if(cancelButton){
        cancelButton.addEventListener('click', function(event) {
            closePopupAdd();
            event.preventDefault(); 
        });
    }

    if(showCheckbox && popupContainer){
        showCheckbox.addEventListener('click', function() {
            if (popupContainer.style.display === 'none') {
                popupContainer.style.display = 'block';
            } else {
                popupContainer.style.display = 'none';
            }
        });
    }
  
    function closePopupAdd() {
      popupContainer.style.display = 'none';
    }
  });

function stopPopup(event) {
    event.stopPropagation();
}

function togglePopup(productId) {
    const popup = document.getElementById(`container ${productId}`);
   
    if (popup.style.display === 'none') {
        popup.style.display = 'block';
    } else {
        popup.style.display = 'none';
    }
}

function closePopup(productId) {
    var container = document.getElementById('container ' + productId);
    container.style.display = 'none';
}

function validateInput(event) {
    var quantityInput = event.target.parentNode.parentNode.querySelector("input[name=add_stock], input[name=remove_stock]");
    var errorContainer = event.target.parentNode.parentNode.querySelector(".errorMessage");
  
    if (quantityInput.value.trim() === "") {
      event.preventDefault();
      errorContainer.textContent = "Please enter a quantity.";
    } else {
      errorContainer.textContent = ""; 
    }
}

function updateStockCount(selectElement,productId) {
    var selectedSize = selectElement.value;
    var dataProductId = parseInt(selectElement.options[selectElement.selectedIndex].getAttribute('data-product-id'))
    var stockElement = document.getElementById('stock ' + productId);
    
    if (stockElement) {
        // Make an AJAX request to fetch the stock based on the selected size
        var xhr = new XMLHttpRequest();
        xhr.onreadystatechange = function () {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var remainingStock = xhr.responseText;
                stockElement.innerText = 'Stock: ' + remainingStock;
            }
        };
        xhr.open('GET', 'getStock.php?product_id=' + dataProductId + '&size=' + selectedSize, true);
        xhr.send();
    }
}


