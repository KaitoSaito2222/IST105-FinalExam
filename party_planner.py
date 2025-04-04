#!/usr/bin/env python3
import sys

def main():
    party_items = [
        "Cake",
        "Balloons",
        "Music System",
        "Lights",
        "Catering Service",
        "DJ",
        "Photo Booth",
        "Tables",
        "Chairs",
        "Drinks",
        "Party Hats",
        "Streamers",
        "Invitation Cards",
        "Party Games",
        "Cleaning Service"
    ]
    
    item_values = [
        20,   # Cake
        21,   # Balloons
        10,   # Music System
        5,    # Lights
        8,    # Catering Service
        3,    # DJ
        15,   # Photo Booth
        7,    # Tables
        12,   # Chairs
        6,    # Drinks
        9,    # Party Hats
        18,   # Streamers
        4,    # Invitation Cards
        2,    # Party Games
        11    # Cleaning Service
    ]
    
    try:
        selected_indices = [int(index.strip()) for index in sys.argv[1].split(",")]
    except ValueError:
        print("Invalid input. Please enter valid indices.")
        return
    
    # Get selected items
    selected_items = [
    party_items[index]
    for index in selected_indices
    if 0 <= index < len(party_items)
    ]
    
    # Calculate base party code using bitwise AND
    base_code = item_values[selected_indices[0]]
    bitwise_expression = str(item_values[selected_indices[0]])
    
    for index in selected_indices[1:]:
        if 0 <= index < len(party_items):
            base_code &= item_values[index]
            bitwise_expression += f" & {item_values[index]}"
    
    # Modify base code with if/else conditions
    original_base_code = base_code
    message = ""
    
    if base_code == 0:
        base_code += 5
        message = "Epic Party Incoming!"
    elif base_code > 5:
        base_code -= 2
        message = "Let's keep it classy!"
    else:
        message = "Chill vibes only!"
    
    print(f"Selected Items: {', '.join(selected_items)}")
    print(f"Base Party Code: {bitwise_expression} = {original_base_code}")
    
    if original_base_code != base_code:
        if original_base_code == 0:
            print(f"Adjusted Party Code: {original_base_code} + 5 = {base_code}")
        elif original_base_code > 5:
            print(f"Adjusted Party Code: {original_base_code} - 2 = {base_code}")
    
    print(f"Final Party Code: {base_code}")
    print(f"Message: {message}")

if __name__ == "__main__":
    main()