<?php
/**
 * Theme storage manipulations
 *
 * @package WordPress
 * @subpackage KARGO
 * @since KARGO 1.0
 */

// Disable direct call
if ( ! defined( 'ABSPATH' ) ) {
	exit; }

// Get theme variable
if ( ! function_exists( 'kargo_storage_get' ) ) {
	function kargo_storage_get( $var_name, $default = '' ) {
		global $KARGO_STORAGE;
		return isset( $KARGO_STORAGE[ $var_name ] ) ? $KARGO_STORAGE[ $var_name ] : $default;
	}
}

// Set theme variable
if ( ! function_exists( 'kargo_storage_set' ) ) {
	function kargo_storage_set( $var_name, $value ) {
		global $KARGO_STORAGE;
		$KARGO_STORAGE[ $var_name ] = $value;
	}
}

// Check if theme variable is empty
if ( ! function_exists( 'kargo_storage_empty' ) ) {
	function kargo_storage_empty( $var_name, $key = '', $key2 = '' ) {
		global $KARGO_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return empty( $KARGO_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return empty( $KARGO_STORAGE[ $var_name ][ $key ] );
		} else {
			return empty( $KARGO_STORAGE[ $var_name ] );
		}
	}
}

// Check if theme variable is set
if ( ! function_exists( 'kargo_storage_isset' ) ) {
	function kargo_storage_isset( $var_name, $key = '', $key2 = '' ) {
		global $KARGO_STORAGE;
		if ( ! empty( $key ) && ! empty( $key2 ) ) {
			return isset( $KARGO_STORAGE[ $var_name ][ $key ][ $key2 ] );
		} elseif ( ! empty( $key ) ) {
			return isset( $KARGO_STORAGE[ $var_name ][ $key ] );
		} else {
			return isset( $KARGO_STORAGE[ $var_name ] );
		}
	}
}

// Inc/Dec theme variable with specified value
if ( ! function_exists( 'kargo_storage_inc' ) ) {
	function kargo_storage_inc( $var_name, $value = 1 ) {
		global $KARGO_STORAGE;
		if ( empty( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = 0;
		}
		$KARGO_STORAGE[ $var_name ] += $value;
	}
}

// Concatenate theme variable with specified value
if ( ! function_exists( 'kargo_storage_concat' ) ) {
	function kargo_storage_concat( $var_name, $value ) {
		global $KARGO_STORAGE;
		if ( empty( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = '';
		}
		$KARGO_STORAGE[ $var_name ] .= $value;
	}
}

// Get array (one or two dim) element
if ( ! function_exists( 'kargo_storage_get_array' ) ) {
	function kargo_storage_get_array( $var_name, $key, $key2 = '', $default = '' ) {
		global $KARGO_STORAGE;
		if ( empty( $key2 ) ) {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $KARGO_STORAGE[ $var_name ][ $key ] ) ? $KARGO_STORAGE[ $var_name ][ $key ] : $default;
		} else {
			return ! empty( $var_name ) && ! empty( $key ) && isset( $KARGO_STORAGE[ $var_name ][ $key ][ $key2 ] ) ? $KARGO_STORAGE[ $var_name ][ $key ][ $key2 ] : $default;
		}
	}
}

// Set array element
if ( ! function_exists( 'kargo_storage_set_array' ) ) {
	function kargo_storage_set_array( $var_name, $key, $value ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$KARGO_STORAGE[ $var_name ][] = $value;
		} else {
			$KARGO_STORAGE[ $var_name ][ $key ] = $value;
		}
	}
}

// Set two-dim array element
if ( ! function_exists( 'kargo_storage_set_array2' ) ) {
	function kargo_storage_set_array2( $var_name, $key, $key2, $value ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( ! isset( $KARGO_STORAGE[ $var_name ][ $key ] ) ) {
			$KARGO_STORAGE[ $var_name ][ $key ] = array();
		}
		if ( '' === $key2 ) {
			$KARGO_STORAGE[ $var_name ][ $key ][] = $value;
		} else {
			$KARGO_STORAGE[ $var_name ][ $key ][ $key2 ] = $value;
		}
	}
}

// Merge array elements
if ( ! function_exists( 'kargo_storage_merge_array' ) ) {
	function kargo_storage_merge_array( $var_name, $key, $value ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			$KARGO_STORAGE[ $var_name ] = array_merge( $KARGO_STORAGE[ $var_name ], $value );
		} else {
			$KARGO_STORAGE[ $var_name ][ $key ] = array_merge( $KARGO_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Add array element after the key
if ( ! function_exists( 'kargo_storage_set_array_after' ) ) {
	function kargo_storage_set_array_after( $var_name, $after, $key, $value = '' ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			kargo_array_insert_after( $KARGO_STORAGE[ $var_name ], $after, $key );
		} else {
			kargo_array_insert_after( $KARGO_STORAGE[ $var_name ], $after, array( $key => $value ) );
		}
	}
}

// Add array element before the key
if ( ! function_exists( 'kargo_storage_set_array_before' ) ) {
	function kargo_storage_set_array_before( $var_name, $before, $key, $value = '' ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( is_array( $key ) ) {
			kargo_array_insert_before( $KARGO_STORAGE[ $var_name ], $before, $key );
		} else {
			kargo_array_insert_before( $KARGO_STORAGE[ $var_name ], $before, array( $key => $value ) );
		}
	}
}

// Push element into array
if ( ! function_exists( 'kargo_storage_push_array' ) ) {
	function kargo_storage_push_array( $var_name, $key, $value ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( '' === $key ) {
			array_push( $KARGO_STORAGE[ $var_name ], $value );
		} else {
			if ( ! isset( $KARGO_STORAGE[ $var_name ][ $key ] ) ) {
				$KARGO_STORAGE[ $var_name ][ $key ] = array();
			}
			array_push( $KARGO_STORAGE[ $var_name ][ $key ], $value );
		}
	}
}

// Pop element from array
if ( ! function_exists( 'kargo_storage_pop_array' ) ) {
	function kargo_storage_pop_array( $var_name, $key = '', $defa = '' ) {
		global $KARGO_STORAGE;
		$rez = $defa;
		if ( '' === $key ) {
			if ( isset( $KARGO_STORAGE[ $var_name ] ) && is_array( $KARGO_STORAGE[ $var_name ] ) && count( $KARGO_STORAGE[ $var_name ] ) > 0 ) {
				$rez = array_pop( $KARGO_STORAGE[ $var_name ] );
			}
		} else {
			if ( isset( $KARGO_STORAGE[ $var_name ][ $key ] ) && is_array( $KARGO_STORAGE[ $var_name ][ $key ] ) && count( $KARGO_STORAGE[ $var_name ][ $key ] ) > 0 ) {
				$rez = array_pop( $KARGO_STORAGE[ $var_name ][ $key ] );
			}
		}
		return $rez;
	}
}

// Inc/Dec array element with specified value
if ( ! function_exists( 'kargo_storage_inc_array' ) ) {
	function kargo_storage_inc_array( $var_name, $key, $value = 1 ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( empty( $KARGO_STORAGE[ $var_name ][ $key ] ) ) {
			$KARGO_STORAGE[ $var_name ][ $key ] = 0;
		}
		$KARGO_STORAGE[ $var_name ][ $key ] += $value;
	}
}

// Concatenate array element with specified value
if ( ! function_exists( 'kargo_storage_concat_array' ) ) {
	function kargo_storage_concat_array( $var_name, $key, $value ) {
		global $KARGO_STORAGE;
		if ( ! isset( $KARGO_STORAGE[ $var_name ] ) ) {
			$KARGO_STORAGE[ $var_name ] = array();
		}
		if ( empty( $KARGO_STORAGE[ $var_name ][ $key ] ) ) {
			$KARGO_STORAGE[ $var_name ][ $key ] = '';
		}
		$KARGO_STORAGE[ $var_name ][ $key ] .= $value;
	}
}

// Call object's method
if ( ! function_exists( 'kargo_storage_call_obj_method' ) ) {
	function kargo_storage_call_obj_method( $var_name, $method, $param = null ) {
		global $KARGO_STORAGE;
		if ( null === $param ) {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $KARGO_STORAGE[ $var_name ] ) ? $KARGO_STORAGE[ $var_name ]->$method() : '';
		} else {
			return ! empty( $var_name ) && ! empty( $method ) && isset( $KARGO_STORAGE[ $var_name ] ) ? $KARGO_STORAGE[ $var_name ]->$method( $param ) : '';
		}
	}
}

// Get object's property
if ( ! function_exists( 'kargo_storage_get_obj_property' ) ) {
	function kargo_storage_get_obj_property( $var_name, $prop, $default = '' ) {
		global $KARGO_STORAGE;
		return ! empty( $var_name ) && ! empty( $prop ) && isset( $KARGO_STORAGE[ $var_name ]->$prop ) ? $KARGO_STORAGE[ $var_name ]->$prop : $default;
	}
}
