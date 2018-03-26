// Import React (Mandatory Step).
import React from 'react';

// Create our Button component as a functional component.
const Button = (props) => {
  return (
    <input
      type="button"
      value={props.label}
      onClick = {props.handleClick}
    />
  );
}

// Export our button component.
export default Button;
