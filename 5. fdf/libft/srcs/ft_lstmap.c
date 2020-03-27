/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   ft_lstmap.c                                        :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: jeagan <jeagan@student.42.fr>              +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/04/05 14:37:05 by jeagan            #+#    #+#             */
/*   Updated: 2019/06/06 11:17:48 by jeagan           ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

#include "libft.h"

t_list				*ft_lstmap(t_list *lst, t_list *(*f)(t_list *elem))
{
	t_list *map;

	if (lst && f)
	{
		if (!(map = (t_list *)malloc(sizeof(t_list))))
			return ((t_list *)0);
		map = (*f)(lst);
		map->next = ft_lstmap(lst->next, f);
		return (map);
	}
	return ((t_list *)0);
}
