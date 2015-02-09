<?php


class restrict {
    
    public static function apply_restriction(table_data $table, 
                                             $restricted_user_group,
                                             $restricted_field_name, 
                                             $restricted_field_value, 
                                             $is_select=true ) {  
                                                
        if ( is_null( $restricted_field_value ) ) return;
        
        //If column is not created, we create it
        if ( ! isset($table->columns_col[$restricted_field_name]) ) {
            if ( ! $is_select ) {
                $table->columns_col[ $restricted_field_name ] = new column_text();
            }
            else $table->columns_col[ $restricted_field_name ] = new column_select();
        }
        if ( ! is_array( $restricted_user_group ) ) {
            $restricted_user_group = array( $restricted_user_group );
        }
        if ( website::$user->is_in_any_group($restricted_user_group) ) {
            // This user is restricted
            $table->columns_col->get($restricted_field_name)
                ->set_restricted_value($restricted_field_value);
                //->set_visible(false);
        } else {
            // This is regular user
            if ( count($table->columns_table_view) > 0 )
                $table->columns_table_view[] = $restricted_field_name;   
        }
        
    }
    
    
} 

